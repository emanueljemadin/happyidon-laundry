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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_in');
            $table->date('tanggal_out');
            $table->string('total_biaya');
            $table->enum('status_ambil', [0, 1]);
            $table->string('berat');
            $table->timestamps();

            $table->foreignId('package_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->unsigned();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
