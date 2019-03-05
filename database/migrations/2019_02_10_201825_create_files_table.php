<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->uuid('id');
            $table->timestamps();
            $table->string('user_id');
            $table->string('fileName');
            $table->string('fileSize');
            $table->text('notes')->nullable();
            $table->string('fileExtension');
            $table->string('fileMime');
            $table->boolean('locked');
            $table->dateTime('timeToDestroy');

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
