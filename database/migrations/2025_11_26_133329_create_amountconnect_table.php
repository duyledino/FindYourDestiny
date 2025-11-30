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
        Schema::create('amount_connect', function (Blueprint $table) {
                        $table->engine = 'InnoDB'; 

            $table->uuid('amountConnect_id')->primary();
            $table->decimal('amount', 10, 2);
            $table->uuid('user_id');

            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amount_connect');
    }
};
