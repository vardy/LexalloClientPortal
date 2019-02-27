<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display page to edit user and resources of user.
    // GET
    public function edit($userID)
    {
        $user = User::find($userID);
        $roles = $user->roles;
        $quotations = $user->quotations;
        $files = $user->files;

        return view('admin.edit_user', [
            'user' => $user,
            'roles' => $roles,
            'quotations' => $quotations,
            'files' => $files
        ]);
    }

    // Commit changes to user or user resource.
    // PATCH
    public function update()
    {

    }

    // Delete a user and its resources
    // DELETE
    public function destroy()
    {

    }
}