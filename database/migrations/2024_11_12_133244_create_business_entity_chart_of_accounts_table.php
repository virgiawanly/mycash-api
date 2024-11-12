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
        Schema::create('business_entity_chart_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->index('be_coa_bi');
            $table->foreignId('business_entity_id')->index('be_coa_bei');
            $table->foreignId('chart_of_account_id')->index('coa_coa_coai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_entity_chart_of_accounts');
    }
};
