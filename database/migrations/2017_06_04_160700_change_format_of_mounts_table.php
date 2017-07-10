<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ChangeFormatOfMountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::Statement('UPDATE mounts m SET m.conference = (SELECT c.id FROM conference c WHERE c.conference_id = m.mount)');

        Schema::table('mounts', function (Blueprint $table) {
          $table->integer('conference')->unsigned()->change();
        });

        Schema::table('mounts', function (Blueprint $table) {
          $table->renameColumn('conference', 'conference_id');
        });

        Schema::table('mounts', function (Blueprint $table) {
          $table->foreign('conference_id')->references('id')->on('conference');
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
        $table->dropForeign('mounts_conference_id_foreign');
      });
      Schema::table('mounts', function (Blueprint $table) {
        $table->dropIndex('mounts_conference_id_foreign');
      });

      Schema::table('mounts', function (Blueprint $table) {
        $table->renameColumn('conference_id', 'conference');
      });

      Schema::table('mounts', function (Blueprint $table) {
        $table->string('conference', 12)->change();
      });

      DB::Statement('UPDATE mounts m SET m.conference = (SELECT c.conference_id FROM conference c WHERE c.id = m.conference)');

    }
}
