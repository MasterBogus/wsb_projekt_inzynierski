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
        Schema::create('dokumenty', function (Blueprint $table) {
            $table->id();
            $table->string('typ_dokumentu',30);
            $table->date('data_rozpoczecia_okresu_waznosci');
            $table->date('data_zakonczenia_okresu_waznosci')->nullable();
            $table->date('data_zakonczenia_najmu')->nullable();
            $table->string('identyfikator_wewnetrzny', 100);
            $table->integer('id_najemcy')->nullable();
            $table->integer('id_lokalu')->nullable();
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
        Schema::dropIfExists('dokumenty');
    }
};
