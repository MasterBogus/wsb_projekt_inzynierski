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
        Schema::create('grzejniki', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lokalu')->nullable()->constrained('lokale');
            $table->string('rodzaj_grzejnikow',50)->nullable();
            $table->integer('ilosc_grzejnikow')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grzejniki');
    }
};
