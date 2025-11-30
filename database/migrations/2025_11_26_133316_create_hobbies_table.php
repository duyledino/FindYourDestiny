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
        Schema::create('hobbies', function (Blueprint $table) {
                        $table->engine = 'InnoDB'; 

            $table->uuid('hobbies_id')->primary();
            $table->string('hobbies_name');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hobbies');
    }
};
