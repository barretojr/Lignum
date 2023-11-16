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
        Schema::create('finantial', function (Blueprint $table) {
            $table->id();
            $table->string("description");
            
            $table->unsignedBigInteger('typefinantial_id');
            $table->foreign('typefinantial_id')->references('id')->on('typefinantial');

            $table->string("value");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial');
    }
};
