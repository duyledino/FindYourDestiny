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
        Schema::create('transaction', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->uuid('transaction_id')->primary();
            $table->decimal('amount', 10, 2);
            $table->timestamp('create_at')->useCurrent();
            $table->uuid('user_id');
            $table->unsignedBigInteger('amount_from');
            $table->unsignedBigInteger('amount_to');

            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
