<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade'); // Foreign key referencing events table
            $table->string('name');
            $table->string('email');
            $table->decimal('amount', 8, 2)->nullable(); // Amount field with 2 decimal places
            $table->integer('date_of_month')->nullable(); // Nullable in case it's not always set
            $table->timestamp('last_payment_confirmed_at')->nullable(); // Nullable in case it's not always set
            $table->timestamps(); // Automatically adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
