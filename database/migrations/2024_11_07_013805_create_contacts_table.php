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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->nullable()->index('cn_cg');
            $table->foreignId('business_entity_id')->nullable()->index('cn_bei');
            $table->foreignId('contact_group_id')->nullable()->index('cn_cgi');
            $table->boolean('is_vendor')->default(false)->index('cn_iv');
            $table->boolean('is_customer')->default(false)->index('cn_ic');
            $table->string('type', 50)->nullable()->index('cn_t');
            $table->string('code', 100)->nullable()->index('cn_c');
            $table->string('business_name')->nullable()->index('cn_bn');
            $table->string('individual_title', 20)->nullable();
            $table->string('individual_name')->nullable()->index('cn_in');
            $table->string('email')->nullable()->index('cn_e');
            $table->string('phone', 20)->nullable()->index('cn_p');
            $table->string('alternate_phone', 20)->nullable();
            $table->string('address', 500)->nullable()->index('cn_adr');
            $table->string('city', 150)->nullable();
            $table->string('state', 150)->nullable();
            $table->string('country', 150)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->text('notes')->nullable();
            $table->string('tax_identification_number', 30)->nullable();
            $table->foreignId('accounts_payable_id')->nullable()->index('cn_aap');
            $table->foreignId('accounts_receivable_id')->nullable()->index('cn_aar');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
