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
        //
        Schema::create('serviceorders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('serviceID'); // Foreign key (if necessary)
            $table->string('itemName');
            $table->string('customerName');
            $table->string('location');
            $table->string('phoneNo');
            $table->string('itemPrice'); 
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('serviceOrders');
    }
};
