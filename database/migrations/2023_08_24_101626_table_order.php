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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('tableID')->nullable()->default(null);
            $table->string('customerName')->nullable()->default(null);
            $table->string('customerPhone')->nullable()->default(null);
            $table->string('customerAddress')->nullable()->default(null);
            $table->string('customerNotes')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
