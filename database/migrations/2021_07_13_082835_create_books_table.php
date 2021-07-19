<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('ddcCode')->index();
            $table->string('name');
            $table->string('author')->nullable();
            $table->string('genre')->nullable();
            $table->string('publisher')->nullable();
            $table->string('translator')->nullable();
            $table->string('country')->nullable();
            $table->string('review')->nullable();
            $table->unsignedBigInteger('copies');
            $table->decimal('price', 12, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
