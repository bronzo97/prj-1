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
        Schema::create('cars', function (Blueprint $table) {

            $table->string('targa', 10)->primary();

            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->unsigned()
                ->onDelete('restrict')->onUpdate('cascade');

            $table->bigInteger('color_id')->unsigned();
            $table->foreign('color_id')->references('id')->on('colors')->unsigned()
                ->onDelete('restrict')->onUpdate('cascade');

            $table->bigInteger('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('models')->unsigned()
                ->onDelete('restrict')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
