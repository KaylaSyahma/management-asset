<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');
            $table->string('name', 255);
            $table->foreignId('category_id')->constrained('categories');
            $table->string('image_url')->nullable();
            $table->enum('ownership_status', ['owned', 'leased', 'rented']);
            $table->string('owner_name', 255)->nullable();
            $table->foreignId('condition_id')->constrained('conditions');
            $table->decimal('purchase_price', 15, 2)->nullable(); // Harga beli aset
            $table->date('purchase_date')->nullable(); // Tanggal pembelian aset
            $table->foreignId('brand_id')->nullable()->constrained('brands'); // merk asset
            $table->decimal('depreciation', 15, 2)->nullable(); // nilai depresiasi
            $table->decimal('residual_value', 15, 2)->nullable(); //nilai residu / sisa asset
            $table->foreignId('location_id')->nullable()->constrained('locations'); // lokasi asset
            $table->foreignId('project_id')->nullable()->constrained('projects'); // project terkait
            $table->text('description')->nullable(); //deskripsi asset

            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_assets');
    }
};
