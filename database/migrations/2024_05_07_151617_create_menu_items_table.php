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
        Schema::create('Menu_Items', function (Blueprint $table) {
            $table->id('id_menuItem');
            $table->integer('id_category');
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->boolean('isAvailable')->default(false);
            $table->string('photo_filename', length: 512)->nullable();
            $table->integer('sales')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Menu_Items');
    }
};
