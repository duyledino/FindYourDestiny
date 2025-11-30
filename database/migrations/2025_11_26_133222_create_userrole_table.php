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
        Schema::create('user_role', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('user_id');
            $table->uuid('role_id');
            $table->primary(['user_id', 'role_id']);
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('role')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role');
    }
};
