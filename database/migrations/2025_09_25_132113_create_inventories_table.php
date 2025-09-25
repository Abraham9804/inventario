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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('detail');
            $table->integer('quantity_in');
            $table->decimal('price_in', 10, 2);
            $table->decimal('total_in', 10, 2);
            $table->integer('quantity_out');
            $table->decimal('price_out', 10, 2);
            $table->decimal('total_out', 10, 2);
            $table->integer('quantity_balance')->default(0);
            $table->decimal('price_balance', 10, 2)->default(0);
            $table->decimal('total_balance', 10, 2)->default(0);
            $table->foreignId('product_id')->constrained()->onDelete('restrict');
            $table->foreignId('warehouse_id')->constrained()->onDelete('restrict');
            $table->morphs('inventoryable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
