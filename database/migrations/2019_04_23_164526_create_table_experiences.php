<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->string('entreprise', 100)->nullable()->default('text');
            $table->string('logo', 100)->nullable()->default('text');
            $table->date('dateDebut')->nullable()->default(null);
            $table->date('dateFin')->nullable()->default(null);
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
        Schema::dropIfExists('experiences');
    }
}
