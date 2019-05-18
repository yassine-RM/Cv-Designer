<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCvs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('condidat_id')->unsigned();
            $table->string('titre', 100)->nullable()->default('text');
            $table->string('presentation', 100)->nullable()->default('text');
            $table->string('photo', 100)->nullable()->default('text');
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
        Schema::dropIfExists('cvs');
    }
}
