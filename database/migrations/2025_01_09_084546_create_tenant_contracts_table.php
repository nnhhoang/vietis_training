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
        Schema::create('tenant_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_room_id')->constrained('apartment_rooms')->onDelete('cascade');
            $table->foreignId('tenant_id')->constrained('tenants')->onDelete('cascade');
            $table->integer('stay_period_int');
            $table->bigInteger('electricity_price');
            $table->bigInteger('water_price');
            $table->bigInteger('other_pay_type')->nullable();
            $table->bigInteger('other_price')->nullable();
            $table->bigInteger('number_of_tenant_current_int');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_contracts');
    }
};
