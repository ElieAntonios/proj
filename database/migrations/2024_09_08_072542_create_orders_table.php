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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('user_id')->constrained('users', 'user_id'); // References user_id in users table
            $table->foreignId('pharmacy_id')->constrained('pharmacies', 'pharmacy_id'); // References pharmacy_id in pharmacies table
            $table->foreignId('drug_id')->constrained('drugs', 'drug_id'); // References drug_id in drugs table
            $table->integer('quantity');
            $table->decimal('total_price', 8, 2);
            $table->string('order_status');
            $table->date('date');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
