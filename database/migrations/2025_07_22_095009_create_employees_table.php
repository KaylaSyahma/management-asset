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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 50)->unique();
            $table->string('name', 100);
            $table->date('join_date');
            $table->string('company', 100)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('position', 100)->nullable();
            $table->boolean('status')->default(true)->comment('1: active, 0: inactive');

            $table->foreignId('created_by')->constrained('users')->onDelete('restrict');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes(); // otomatis bikin deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
