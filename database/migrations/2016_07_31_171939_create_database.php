<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->string('description', 500);
            $table->enum('is_deleted', [0,1,2]);
            $table->timestamps();
        });
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            // $table->foreign('project_id')->references('id')->on('projects');
            $table->string('name');
            $table->enum('status', [0,1,2]);
            $table->enum('is_deleted', [0,1,2]);
            $table->timestamps();
        });
        Schema::create('tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            // $table->foreign('project_id')->references('id')->on('projects');
            $table->string('str', 8)->unique();
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
        Schema::drop('projects');
        Schema::drop('areas');
        Schema::drop('tokens');
    }
}
