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
        Schema::create('drugs', function (Blueprint $table) {
            $table->id('drug_id');
            $table->string('name');
            $table->string('company');
            $table->text('information')->nullable(); // Text or JSON for additional info
            $table->date('expiry_date');
            $table->boolean('prescription_required');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugs');
    }
};
