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
        Schema::create('service_items', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->string('itemName');
            $table->string('itemPrice');
            $table->string('itemImage')->nullable();
            $table->string('phoneNumber');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_items');
    }
};
