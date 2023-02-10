<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokale', function (Blueprint $table) {
            $table->id();
            $table->string('adres_lokalu', 50);
            $table->string('kod_pocztowy_lokalu',6);
            $table->integer('kondygnacja');
            $table->string('stan_prawny', 50);
            $table->boolean('winda')->nullable();
            $table->boolean('przyst_niepelnospr')->nullable();
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
        Schema::dropIfExists('lokale');
    }
};
