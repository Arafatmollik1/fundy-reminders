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
        Schema::create('events', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('day_of_the_month')->nullable();
                $table->boolean('recurring')->nullable();
                $table->boolean('has_message')->nullable();
                $table->string('message')->nullable();
                $table->boolean('hasPayment')->nullable();
                $table->float('amount')->nullable();
                $table->string('bank_id')->nullable();
                $table->string('recipient_name')->nullable();
                $table->string('mobile_pay_number')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
