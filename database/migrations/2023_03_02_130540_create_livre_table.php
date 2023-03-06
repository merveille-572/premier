<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function integer($column, $autoIncrement = false, $unsigned = false)
    {
        Schema::create('livre', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name');
            $table->string('auteur');
            $table->string('edition ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('livre');
    }
};
?>