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
        Schema::create('accountsubscription', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_sub');
            $table->dateTime('end_sub');
            $table->UnsignedBigInteger('account_id'); //le champ
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->UnsignedBigInteger('sub_id'); //le champ
            $table->foreign('sub_id')->references('id')->on('subscriptions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accountsubscription');
    }
};
