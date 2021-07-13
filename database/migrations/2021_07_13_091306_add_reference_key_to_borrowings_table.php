<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferenceKeyToBorrowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borrowings', function (Blueprint $table) {
            $table->foreign('borrowerCode')->references('borrowerCode')->on('borrowers')->onDelete('CASCADE');
            $table->foreign('ddcCode')->references('ddcCode')->on('books')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borrowings', function (Blueprint $table) {
            //
            $table->dropForeign('borrowerCode');
            $table->dropForeign('ddcCode');
        });
    }
}
