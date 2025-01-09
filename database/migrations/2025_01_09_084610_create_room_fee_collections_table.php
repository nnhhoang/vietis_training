<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('room_fee_collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_contract_id')->constrained('tenant_contracts')->onDelete('cascade');
            $table->integer('electricity_number_before_int');
            $table->integer('electricity_number_after_int');
            $table->integer('water_number_before_int');
            $table->integer('water_number_after_int');
            $table->dateTime('charge_date');
            $table->bigInteger('total_debt');
            $table->bigInteger('total_paid');
            $table->string('fee_collection_uid', 64);
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_fee_collections');
    }
};
