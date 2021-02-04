<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAppealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_appeals', function (Blueprint $table) {
            $table->id('appeal_id');
            $table->string('subject');
            $table->text('message');
            $table->string('client_name');
            $table->string('client_email');
            $table->string('file');
            $table->boolean('is_reviewed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_appeals');
    }
}
