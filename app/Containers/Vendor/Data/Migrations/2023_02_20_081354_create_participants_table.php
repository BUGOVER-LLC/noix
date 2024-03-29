<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the Migrations.
     */
    public function up(): void
    {
        Schema::connection('pgsql_app')->create('participants', function (Blueprint $table) {
            $table->id('participant_id')->index('participants_index_participant_id');
            $table->unsignedBigInteger('channel_id')->index('participants_index_channel_id');
            $table->unsignedBigInteger('user_id')->index('participants_index_user_id');
            $table->timestamp('created_id')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the Migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('participants');
    }
};
