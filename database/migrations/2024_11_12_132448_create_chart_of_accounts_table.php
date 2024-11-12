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
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->index('coa_bi');
            $table->string('name')->nullable()->index('coa_n');
            $table->string('code')->nullable()->index('coa_c');
            $table->string('type', 50)->nullable()->index('coa_t');
            $table->foreignId('parent_id')->nullable()->index('coa_pi');
            $table->string('description')->nullable()->index('coa_d');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chart_of_accounts');
    }
};
