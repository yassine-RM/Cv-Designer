<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLangues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('langue', 100)->nullable()->default('text');
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
        Schema::dropIfExists('langues');
    }
}
