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
        Schema::create('land_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');
            $table->string('name', 255);
            $table->foreignId('category_id')->constrained('categories');
            $table->text('image_url')->nullable();
            $table->text('address'); // Alamat lengkap dari aset tanah
            $table->string('owner_name', 255)->nullable(); 
            $table->decimal('land_area', 10, 2);
            $table->decimal('building_area', 10, 2)->nullable();
            $table->string('certificate_number', 100)->nullable(); // Nomor sertifikat tanah
            $table->string('certificate_owner', 255)->nullable(); // Nomor sertifikat tanah
            $table->enum('certificate_status', ['SHM', 'HGB'])->nullable(); // Nomor sertifikat tanah
            $table->foreignId('certificate_location_id')->constrained('locations'); // Nomor sertifikat tanah
            $table->string('imb_holder_name', 255)->nullable(); 
            $table->string('imb_number', 100)->nullable();
            $table->foreignId('imb_location_id')->constrained('locations');
            $table->decimal('latitude', 9, 6)->nullable();
            $table->decimal('longitude', 9, 6)->nullable();
            $table->enum('imb_status', ['VALID', 'EXPIRED', 'other'])->nullable();
            $table->string('pbb_number', 100)->nullable();
            $table->string('pbb_holder_name', 255)->nullable();
            $table->foreignId('pbb_location_id')->constrained('locations');
            $table->enum('pbb_status', ['PAID', 'UNPAID', 'other'])->nullable();
            $table->decimal('pbb_value', 15, 2)->nullable();
            $table->string('appraiser_name', 255)->nullable();
            $table->decimal('appraisal_value', 15, 2)->nullable();
            $table->year('appraisal_year')->nullable();
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->date('purchase_date')->nullable();
            $table->decimal('current_price', 15, 2)->nullable();
            $table->decimal('transfer_fee', 15, 2)->nullable();
            $table->decimal('other_fees', 15, 2)->nullable();
            $table->decimal('depreciation', 15, 2)->nullable();
            $table->decimal('residual_value', 15, 2)->nullable();
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('project_id')->constrained('projects');
            $table->text('description')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
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
        Schema::dropIfExists('land_assets');
    }
};
