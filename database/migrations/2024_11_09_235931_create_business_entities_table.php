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
        Schema::create('business_entities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->nullable()->index('bei_bi');
            $table->string('name')->nullable()->index('bei_n');
            $table->string('code')->nullable()->index('bei_c');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_entities');
    }
};
