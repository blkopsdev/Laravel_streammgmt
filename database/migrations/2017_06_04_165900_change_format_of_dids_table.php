<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ChangeFormatOfDidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('dids', function (Blueprint $table) {
          $table->renameColumn('conference', 'conference_id');
          $table->renameColumn('vendor', 'vendor_id');
        });

        Schema::table('dids', function (Blueprint $table) {
          $table->integer('conference_id')->nullable()->unsigned()->change();
        });

        DB::Statement('UPDATE dids SET conference_id = NULL WHERE conference_id = 0');

        Schema::table('dids', function (Blueprint $table) {
          $table->foreign('conference_id')->references('id')->on('conference');
          $table->foreign('vendor_id')->references('id')->on('vendor');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('dids', function (Blueprint $table) {
        $table->dropForeign('dids_conference_id_foreign');
        $table->dropForeign('dids_vendor_id_foreign');
      });

      Schema::table('dids', function (Blueprint $table) {
        $table->renameColumn('conference_id', 'conference');
        $table->renameColumn('vendor_id', 'vendor');
      });

      DB::Statement('UPDATE dids SET conference = 0 WHERE conference = NULL');

      Schema::table('dids', function (Blueprint $table) {
        $table->integer('conference')->change();
      });

    }
}
