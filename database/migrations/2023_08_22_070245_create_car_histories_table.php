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
        Schema::create('car_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id');
            $table->foreignId('driver_id');
            $table->foreignId('employee_id');
            $table->date('history_pinjam');
            $table->date('history_kembali')->nullable();
            $table->string('history_note');
            $table->boolean('history_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_histories');
    }
};
