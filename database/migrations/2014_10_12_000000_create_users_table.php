<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('civitite', 100)->nullable()->default('text');
            $table->string('nom', 100)->nullable()->default('text');
            $table->string('prenom', 100)->nullable()->default('text');
            $table->string('photo', 100)->nullable()->default('text');
            $table->string('situation_pro', 100)->nullable()->default('text');
            $table->integer('telephonne')->unsigned()->nullable()->default(12);
            $table->string('adresse', 100)->nullable()->default('text');
            $table->string('paye', 100)->nullable()->default('text');
            $table->string('ville', 100)->nullable()->default('text');
            $table->date('dateNaissance')->nullable()->default(null);
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
