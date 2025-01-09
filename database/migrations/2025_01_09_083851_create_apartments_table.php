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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name', 45);
            $table->string('email', 256)->nullable();
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('ward_id');
            $table->string('address', 256);
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('prefectures');
            $table->foreign('district_id')->references('id')->on('prefectures');
            $table->foreign('ward_id')->references('id')->on('prefectures');
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
