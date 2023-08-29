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
        Schema::create('shopSittingTable', function (Blueprint $table) {
            $table->id();
            $table->integer('shopID')->nullable()->default(null);
            $table->string('table_name')->nullable()->default(null);
            $table->string('table_type')->nullable()->default(null);
            $table->integer('total')->nullable()->default(null);
            $table->integer('booked')->nullable()->default(null);
            $table->integer('currentOrder')->nullable()->default(null);
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
