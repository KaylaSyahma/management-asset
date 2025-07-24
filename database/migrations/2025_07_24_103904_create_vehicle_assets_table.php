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
        Schema::create('vehicle_assets', function (Blueprint $table) {
            $table->foreignId('id')->primary();
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');
            $table->string('name', 255);
            $table->string('license_plate', 20);
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');
            $table->text('image_url')->nullable();
            $table->string('owner_name', 255)->nullable();
            $table->enum('ownership_status', ['OWNED', 'LEASED', 'RENTED']);
            $table->foreignId('condition_id')->constrained('conditions')->onDelete('set null');
            $table->year('production_year');
            $table->string('color', 50)->nullable();
            $table->string('insurance_policy_number', 100)->nullable();
            $table->string('stnk_number', 100)->nullable();
            $table->date('stnk_date')->nullable();
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->date('purchase_date')->nullable();
            $table->foreignId('brand_id')->constrained('brands')->onDelete('set null');
            $table->decimal('depreciation', 15, 2)->nullable();
            $table->decimal('residual_value', 15, 2)->nullable();
            $table->foreignId('location_id')->constrained('locations')->onDelete('set null');
            $table->foreignId('project_id')->constrained('projects')->onDelete('set null');
            $table->text('description')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_assets');
    }
};
