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
        Schema::create('costumers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('phone')->unique();
            $table->text('address')->default('address')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('debt')->default(0);
            $table->text('trust_status')->nullable();


            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

//            $table->unsignedBigInteger('product')->index();
//            $table->foreign('debt_id')->references('id')->on('debts')->onDelete('cascade');
//
//            $table->unsignedBigInteger('quantity')->index();
//            $table->foreign('debt_id')->references('id')->on('debts')->onDelete('cascade');
//
//            $table->unsignedBigInteger('end_day')->index();
//            $table->foreign('debt_id')->references('id')->on('debts')->onDelete('cascade');


//            $table->unsignedBigInteger('costumer_name')->index();
//            $table->foreign('costumer_id')->references('id')->on('costumers')->onDelete('cascade');
//            $table->unsignedBigInteger('user_id')->index();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->text('product');
//            $table->text('quantity');
//            $table->date('end_day');
//            $table->integer('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costumers');
    }
};
