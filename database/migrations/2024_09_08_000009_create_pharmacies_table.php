<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id('pharmacy_id');
            $table->string('name');
            $table->string('location');
            $table->json('available_drugs'); // Enum or JSON list of available drugs
            $table->string('pharmacy_phone')->nullable();
            $table->string('pharmacy_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacies');
    }
};
