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
        Schema::create('package_features', function (Blueprint $table) {
            $table->unsignedBigInteger('subscription_package_id');
            $table->unsignedBigInteger('feature_id');
            $table->timestamps();
            $table->softDeletes();
        
            // Foreign keys
            $table->foreign('subscription_package_id')->references('id')->on('subscription_packages')->onDelete('cascade');
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
        
            // Composite primary key
            $table->primary(['subscription_package_id', 'feature_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_features');
    }
};
