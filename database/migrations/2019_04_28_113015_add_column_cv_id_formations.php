<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCvIdFormations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formations', function (Blueprint $table) {
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
        Schema::table('formations', function (Blueprint $table) {
            //
        });
    }
}
