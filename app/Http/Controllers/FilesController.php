<?php

namespace App\Http\Controllers;

use App\Files;
use App\Quotations;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the files for the
     * currently logged in user.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $request->session()->forget('user-was-editing');
        $request->session()->forget('from-admin');

        $filesDeliverable = auth()->user()->files->where('isDeliverable', '1');
        $filesUser = auth()->user()->files->where('isDeliverable', '0');

        return view('files.index', [
            'filesDeliverable' => $filesDeliverable,
            'filesUser' => $filesUser
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'uploadedFiles' => ['required', 'max:2999999']
        ]);

        $filesUploaded = $request->allFiles()["uploadedFiles"];

        foreach ($filesUploaded as $fileFromForm) {
            $fileUploadedName = $fileFromForm->getClientOriginalName();

            // Set file object to get ready for commit to storage
            $file = new Files();
            if($request->session()->get('from-admin', false) === 'true') {
                $file->user_id = $request->session()->get('user-was-editing');
                $file->isDeliverable = $request->isDeliverable;
            } else {
                $file->user_id = auth()->user()->id;
                $file->isDeliverable = false;
            }

            $file->fileName = $fileUploadedName;
            $file->fileSize = (string) $fileFromForm->getSize();
            $file->fileExtension = $fileFromForm->getClientOriginalExtension();
            $file->fileMime = $fileFromForm->getClientMimeType();
            $file->locked = $request->locked;
            $file->timeToDestroy = Carbon::now()->addWeek()->addWeek();
            $file->save();

            // Commit object to s3 with file path and contents of file (key:object)
            $filePathToStore = '/clientportal/' . $file->id;
            \Storage::disk('s3')->put($filePathToStore, file_get_contents($fileFromForm));
        }

        if($request->session()->pull('from-admin', 'false') === 'true') {

            $oldUser = $request->session()->pull('user-was-editing', 'false');
            if($oldUser !== 'false') {
                return redirect('/admin/user/' . $oldUser);
            } else {
                return redirect('/files');
            }
        } else {
            return redirect('/files');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function show($fileId, Files $files)
    {

        $filePathExpected = '/clientportal/' . $fileId;

        if (!$fileId || !Storage::exists($filePathExpected)) {
            abort(404);
        }

        if(Files::findOrFail($fileId)->user_id !== auth()->user()->id && !auth()->user()->authorizeRoles(['admin','pm'])) {
            // Checks if user has access to file download.
            // Not sure why being able to download the file overrides the redirect
            // authorizeRoles should be giving for those who do not have the admin
            // or pm role, but it does so it works.
        }

        return response()->stream(function() use ($filePathExpected) {
            $stream = Storage::readStream($filePathExpected);
            fpassthru($stream);
            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, [
            'Cache-Control'         => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Type'          => Storage::mimeType($filePathExpected),
            'Content-Length'        => Storage::size($filePathExpected),
            'Content-Disposition'   => 'attachment; filename="' . Files::findOrFail($fileId)->fileName . '"',
            'Pragma'                => 'public',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function edit($fileId, Files $files, Request $request)
    {
        if(auth()->user()) {
            auth()->user()->authorizeRoles(['admin','pm']);
        } else {
            return redirect('/login');
        }

        $request->session()->forget('user-was-editing');
        $request->session()->forget('from-admin');

        return view('files.edit', [
            'file' => Files::findOrFail($fileId)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function update($fileId, Request $request, Files $files)
    {
        if(auth()->user()) {
            auth()->user()->authorizeRoles(['admin','pm']);
        } else {
            return redirect('/login');
        }

        $file = Files::findOrFail($fileId);
        $file->locked = $request->locked;
        $file->isDeliverable = $request->isDeliverable;
        $file->save();

        if($request->session()->pull('from-admin', 'false') === 'true') {

            $oldUser = $request->session()->pull('user-was-editing', 'false');
            if($oldUser !== 'false') {
                return redirect('/admin/user/' . $oldUser);
            } else {
                return redirect('/files');
            }
        } else {
            return redirect('/files');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy($fileId, Files $files, Request $request)
    {
        Files::findOrFail($fileId)->delete();

        $s3PathToFile = '/clientportal/' . $fileId;
        Storage::delete($s3PathToFile);

        if($request->session()->pull('from-admin', 'false') === 'true') {

            $oldUser = $request->session()->pull('user-was-editing', 'false');
            if($oldUser !== 'false') {
                return redirect('/admin/user/' . $oldUser);
            } else {
                return redirect('/files');
            }
        } else {
            return redirect('/files');
        }
    }

    public function view($fileId)
    {
        if(auth()->user()) {
            auth()->user()->authorizeRoles(['admin','pm']);
        } else {
            return redirect('/login');
        }

        if(!(Files::findOrFail($fileId)->user_id !== auth()->user()->id && !auth()->user()->authorizeRoles(['admin','pm']))) {
            if((Files::where('id', $fileId)->first() !== null) && Storage::disk('s3')->exists('/clientportal/' . $fileId)) {

                Storage::disk('local')->put('/files_for_viewing/' . $fileId, Storage::disk('s3')->get('/clientportal/' . $fileId));
                return response()->file(storage_path() . '/app/files_for_viewing/' . $fileId);

            } else {
                abort(404);
            }
        } else {
            abort(401);
        }
    }
}
