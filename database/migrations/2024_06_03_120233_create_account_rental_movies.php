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
        Schema::create('account_rental_movies', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_rental');
            $table->dateTime('end_rental');
            $table->UnsignedBigInteger('account_id'); //le champ
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->UnsignedBigInteger('movie_id'); //le champ
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->UnsignedBigInteger('operation_id'); //le champ
            $table->foreign('operation_id')->references('id')->on('operationtypes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_rental_movies');
    }
};
