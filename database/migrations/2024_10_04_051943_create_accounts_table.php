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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 50);
            $table->integer('phone_number');
            $table->bigInteger('gps_id');
            $table->integer('sim_number');
            $table->foreignId('status_id')->default(2)->constrained('statuses')->onDelete('cascade');
            $table->foreignId('tariff_id')->constrained('tariffs')->onDelete('cascade');
            $table->timestamps();

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['tariff_id']);
        });

        Schema::dropIfExists('accounts');
    }
};
