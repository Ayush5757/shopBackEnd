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
        Schema::create('shopdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->nullable()->default(null);
            $table->string('shopName')->nullable()->default(null);
            $table->string('shopAddress')->nullable()->default(null);
            $table->string('googleMapAddress')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->integer('rating')->nullable()->default(null);
            $table->integer('shopStatus')->nullable()->default(null);
            $table->integer('experience')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopdetails');
    }
};
