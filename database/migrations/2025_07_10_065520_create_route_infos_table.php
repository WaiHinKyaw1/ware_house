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
        Schema::create('route_infos', function (Blueprint $table) {
            $table->id();
            $table->string('start');
            $table->string('end');
            $table->decimal('distance_km');
            $table->decimal('distance_miles');
            $table->time('duration_minutes');
            $table->integer('charge');
            $table->string('polyline')->nullable();
            $table->foreignId('truck_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('supply_request_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_infos');
    }
};
