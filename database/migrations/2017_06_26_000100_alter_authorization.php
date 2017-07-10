<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AlterAuthorization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement('ALTER TABLE `mounts`
        DROP COLUMN `authorize`');

      Schema::create('conference_authorization_level', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name')->unique();
        $table->timestamps();
      });

      Schema::create('mount_authorization_level', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name')->unique();
        $table->timestamps();
      });

      DB::table('conference_authorization_level')->insert([
        ['id' => 1, 'name' => 'Open'],
        ['id' => 2, 'name' => 'Block Unlisted'],
        ['id' => 3, 'name' => 'Verify User ID'],
        ['id' => 4, 'name' => 'Locked']
      ]);

      DB::table('mount_authorization_level')->insert([
        ['id' => 1, 'name' => 'Open'],
        ['id' => 2, 'name' => 'Require Unvalidated Info'],
        ['id' => 3, 'name' => 'WhiteList Only'],
        ['id' => 4, 'name' => 'Closed']
      ]);

      /*Schema::table('conference', function (Blueprint $table) {
        $table->dropColumn('authorize');
      });*/

      Schema::table('conference', function (Blueprint $table) {
        $table->integer('conference_authorization_level_id')->unsigned()->default(1);
      });

      Schema::table('mounts', function (Blueprint $table) {
        $table->integer('mount_authorization_level_id')->unsigned()->default(1);
      });

      Schema::table('mounts', function (Blueprint $table) {
        $table->foreign('mount_authorization_level_id')
          ->references('id')
          ->on('mount_authorization_level');
      });

      Schema::table('conference', function (Blueprint $table) {
        $table->foreign('conference_authorization_level_id')
          ->references('id')
          ->on('mount_authorization_level');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('mounts', function (Blueprint $table) {
        $table->dropForeign('mounts_mount_authorization_level_id_foreign');
      });
      Schema::table('mounts', function (Blueprint $table) {
        $table->dropIndex('mounts_mount_authorization_level_id_foreign');
      });


      Schema::table('mounts', function (Blueprint $table) {
        $table->renameColumn('mount_authorization_level_id', 'authorize');
      });


      Schema::table('conference', function (Blueprint $table) {
        $table->dropForeign('conference_conference_authorization_level_id_foreign');
      });

      Schema::table('conference', function (Blueprint $table) {
        $table->dropIndex('conference_conference_authorization_level_id_foreign');
      });

      /*Schema::table('conference', function (Blueprint $table) {
        $table->renameColumn('conference_authorization_level_id', 'authorize');
      });*/

      /*DB::statement('ALTER TABLE `conference` DROP INDEX `conference_conference_authorization_level_id_foreign`');

      DB::statement('ALTER TABLE `mounts`
        DROP INDEX `mounts_mount_authorization_level_id_foreign`,
        DROP FOREIGN KEY `mounts_mount_authorization_level_id_foreign`');

      DB::statement('ALTER TABLE `mounts`
        DROP COLUMN `authorize`');
      */

      Schema::dropIfExists('mount_authorization_level');
      Schema::dropIfExists('conference_authorization_level');

    }
}
