<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('typefinancial', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('financial', function (Blueprint $table) {
            $table->id();
            $table->string("description");
            $table->unsignedBigInteger("type");
            $table->foreign('type')->references('id')->on('typefinancial');
            $table->decimal("value", 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('financial')->whereNotNull('type')->delete();

        Schema::dropIfExists('typefinancial');
        Schema::dropIfExists('financial');        
    }
};
