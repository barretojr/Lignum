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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->string("name");
            $table->string("rg")->nullable();;
            $table->string("cpf")->nullable();;
            $table->string("birthday")->nullable();;
            $table->string("email");
            $table->string("cellphone")->nullable();;
            $table->string("address");
            $table->string("number");
            $table->string("cep")->nullable();;
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
