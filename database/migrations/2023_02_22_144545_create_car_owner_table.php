<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_owner', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('car_id', 10);
            $table->foreign('car_id')->references('targa')->on('cars')->unsigned()
                ->onDelete('restrict')->onUpdate('cascade');

            $table->string('owner_id', 16);
            $table->foreign('owner_id')->references('codice_fiscale')->on('owners')->unsigned()
                ->onDelete('restrict')->onUpdate('cascade');

            $table->date('data_acquisto');
            $table->date('data_vendita');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_owner');
    }
};
