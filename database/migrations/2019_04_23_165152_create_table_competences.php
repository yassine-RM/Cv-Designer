<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompetences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('domaine', 100)->nullable()->default('text');
            $table->string('competence', 100)->nullable()->default('text');
            $table->integer('pourcentage')->unsigned()->nullable()->default(12);
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
        Schema::dropIfExists('competences');
    }
}
