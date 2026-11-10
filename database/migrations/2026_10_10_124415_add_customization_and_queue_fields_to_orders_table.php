<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('level_pedas')->nullable();
            $table->string('sayur')->nullable();
            $table->string('jenis_mie')->nullable();
            $table->boolean('topping_tahu')->default(false);
            $table->text('catatan')->nullable();
            $table->string('status_pembayaran')->default('pending');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'level_pedas',
                'sayur',
                'jenis_mie',
                'topping_tahu',
                'catatan',
                'status_pembayaran',
            ]);
        });
    }
};
