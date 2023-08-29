<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productShop', function (Blueprint $table) {
            $table->id();
            $table->string('user_ID')->nullable()->default(null);
            $table->string('product_name')->nullable()->default(null);
            $table->integer('price')->nullable()->default(null);
            $table->string('product_company')->nullable()->default(null);
            $table->integer('product_quantity')->nullable()->default(null);
            $table->string('product_description')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->integer('categorie')->nullable()->default(null);
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
