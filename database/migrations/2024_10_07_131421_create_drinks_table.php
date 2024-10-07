<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->id(); // Kolom ID utama
            $table->string('name'); // Nama minuman
            $table->text('description')->nullable(); // Deskripsi minuman
            $table->decimal('price', 8, 2); // Harga minuman
            $table->timestamps(); // created_at dan updated_at
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
}
