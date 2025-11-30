<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('user_id')->primary();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_name')->nullable(false);
            $table->string('user_image')->nullable(false);
            //Male or Female
            $table->string('user_gender')->default("Male");
            $table->string('user_address')->nullable();
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('update_at')->useCurrent();
            $table->boolean('ban')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
