<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGroupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('conference', function (Blueprint $table) {
          $table->integer('id')->unsigned()->change();
        });*/

        Schema::create('conference_access_level', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        DB::table('conference_access_level')->insert([
          ['id' => 1, 'name' => 'Listen'],
          ['id' => 2, 'name' => 'Banned'],
          ['id' => 3, 'name' => 'Admin']
        ]);

        Schema::create('user_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('conference_to_group', function (Blueprint $table) {
            $table->integer('conference_id')->unsigned();
            $table->integer('user_group_id')->unsigned();
            $table->integer('conference_access_level_id')->unsigned();

            $table->foreign('conference_id')
                ->references('id')
                ->on('conference');

            $table->foreign('user_group_id')
                ->references('id')
                ->on('user_group');

            $table->foreign('conference_access_level_id')
                ->references('id')
                ->on('conference_access_level');

            $table->primary(['conference_id', 'user_group_id']);
        });

        Schema::create('user_to_group', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('user_group_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('user_group_id')
                ->references('id')
                ->on('user_group');

            $table->primary(['user_id', 'user_group_id']);
        });

      Schema::create('conference_to_user', function (Blueprint $table) {
            $table->integer('conference_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('conference_access_level_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('conference_id')
                ->references('id')
                ->on('conference');

            $table->foreign('conference_access_level_id')
                ->references('id')
                ->on('conference_access_level');

            $table->primary(['user_id', 'conference_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('conference_to_group');
      Schema::dropIfExists('conference_to_user');
      Schema::dropIfExists('conference_access_level');
      Schema::dropIfExists('user_to_group');
      Schema::dropIfExists('user_group');
    }
}
