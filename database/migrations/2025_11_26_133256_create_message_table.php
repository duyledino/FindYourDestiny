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
        Schema::create('message', function (Blueprint $table) {
                        $table->engine = 'InnoDB'; 
            $table->uuid('chat_id');
            $table->uuid('message_id')->primary();
            $table->text('content');
            $table->timestamp('create_at')->useCurrent();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->foreign('chat_id')->references('chat_id')->on('chat')->onDelete('cascade');
        
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
