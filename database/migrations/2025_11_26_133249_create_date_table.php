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
        Schema::create('dates', function (Blueprint $table) {
                        $table->engine = 'InnoDB'; 

            $table->uuid('date_id')->primary();
            $table->timestamp('connect_at')->useCurrent();
            $table->uuid('user1_id');
            $table->uuid('user2_id');
            $table->decimal('amount_to_connect', 10, 2);

            $table->foreign('user1_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->foreign('user2_id')->references('user_id')->on('user')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date');
    }
};
