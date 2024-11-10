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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('inventory_id');
            $table->foreignId('pharmacy_id')->constrained('pharmacies', 'pharmacy_id'); // References pharmacy_id in pharmacies table
            $table->foreignId('drug_id')->constrained('drugs', 'drug_id'); // References drug_id in drugs table
            $table->integer('quantity');
            $table->date('last_update');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
