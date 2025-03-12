<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question_en'); // Question in English
            $table->string('question_ar'); // Question in Arabic
            $table->text('answer_en'); // Answer in English
            $table->text('answer_ar'); // Answer in Arabic
            $table->boolean('is_active')->default(true); // Status of FAQ
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
