<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id(); $table->string('name'); $table->enum('type',['motor','mobil']);
            $table->string('brand')->nullable(); $table->string('plate_number')->unique();
            $table->text('description')->nullable(); $table->decimal('price_per_day',12,2);
            $table->string('image')->nullable(); $table->enum('status',['available','maintenance'])->default('available');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('vehicles'); }
};
