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
            $table->string('author');
            $table->string('genre');
            $table->string('publisher');
            $table->string('translator');
            $table->string('country');
            $table->string('review');
            $table->unsignedBigInteger('copies');
            $table->decimal('price', 12, 2);
            $table->string('image');
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
