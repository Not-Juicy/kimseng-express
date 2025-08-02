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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('destination');
            $table->string('service_type'); // express, standard, economy
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('pickup_address');
            $table->string('delivery_address');
            $table->text('description')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, in_transit, delivered, cancelled
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
