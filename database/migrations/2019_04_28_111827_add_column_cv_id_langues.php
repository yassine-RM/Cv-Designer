<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCvIdLangues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('langues', function (Blueprint $table) {
            $table->unsignedBigInteger('cv_id')->after('id');

            $table->foreign('cv_id')->references('id')->on('cvs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('langues', function (Blueprint $table) {
            //
        });
    }
}
