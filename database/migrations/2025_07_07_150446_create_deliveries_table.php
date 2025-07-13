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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supply_request_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('ware_house_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('delivery_date');
            $table->string('status');
            $table->decimal('delivery_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
