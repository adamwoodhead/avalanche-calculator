<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commit_logs', function (Blueprint $table) {
            $table->id();

            $table->string('sha')->unique()->index();

            $table->string('message');
            $table->string('author');
            $table->string('author_email');
            $table->dateTime('date');
            $table->string('avatar_url');
            $table->integer('changes');
            $table->integer('additions');
            $table->integer('deletions');

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
        Schema::dropIfExists('commit_logs');
    }
}
