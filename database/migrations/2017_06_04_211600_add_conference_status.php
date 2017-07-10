<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddConferenceStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conference', function (Blueprint $table) {
          $table->string('current_status')->default('')->nullable();
          $table->unsignedInteger('peak_participants')->default(0)->nullable();
          $table->unsignedInteger('current_participants')->default(0)->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('conference', function (Blueprint $table) {
         $table->dropColumn(['current_status', 'peak_participants', 'current_participants']);
      });

    }
}
