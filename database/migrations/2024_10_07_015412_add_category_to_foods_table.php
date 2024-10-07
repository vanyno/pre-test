<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('foods', function (Blueprint $table) {
        $table->string('category')->default('Makan'); // Default ke 'Makan'
    });
}

public function down()
{
    Schema::table('foods', function (Blueprint $table) {
        $table->dropColumn('category');
    });
}
}
