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
        Schema::create('business_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->nullable()->index('bl_bi');
            $table->foreignId('business_entity_id')->nullable()->index('bl_bei');
            $table->string('name')->nullable()->index('bl_n');
            $table->string('code')->nullable()->index('bl_c');
            $table->string('address', 500)->nullable()->index('bl_adr');
            $table->string('city', 150)->nullable();
            $table->string('state', 150)->nullable();
            $table->string('country', 150)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->foreignId('pic_id')->nullable()->index('bl_pi');
            $table->string('pic_name')->nullable();
            $table->string('pic_email')->nullable();
            $table->string('pic_phone', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_locations');
    }
};
