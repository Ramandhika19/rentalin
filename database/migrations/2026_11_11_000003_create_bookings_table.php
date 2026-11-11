<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained()->restrictOnDelete();
            $table->date('start_date'); $table->date('end_date'); $table->unsignedInteger('total_days');
            $table->decimal('total_price',12,2); $table->enum('payment_method',['transfer','cash']);
            $table->enum('payment_status',['unpaid','waiting_verification','paid','rejected'])->default('unpaid');
            $table->enum('status',['pending','confirmed','ongoing','completed','cancelled'])->default('pending');
            $table->text('notes')->nullable(); $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('bookings'); }
};
