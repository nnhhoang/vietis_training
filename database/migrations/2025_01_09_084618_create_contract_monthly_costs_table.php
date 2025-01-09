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
        Schema::create('contract_monthly_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_contract_id')->constrained('tenant_contracts')->onDelete('cascade');
            $table->foreignId('monthly_cost_id')->constrained('monthly_costs')->onDelete('cascade');
            $table->integer('pay_type');
            $table->bigInteger('price');
            $table->timestamps();
        });
    }       

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_monthly_costs');
    }
};
