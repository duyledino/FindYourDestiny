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
        Schema::create('report', function (Blueprint $table) {
                        $table->engine = 'InnoDB'; 

            $table->uuid('report_id')->primary();
            $table->string('report_name');
            $table->uuid('user_create_id');
            $table->uuid('user_been_reported_id');
            $table->timestamp('create_at')->useCurrent();
            $table->text('content');

            $table->foreign('user_create_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->foreign('user_been_reported_id')->references('user_id')->on('user')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
