<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shared_channels', function (Blueprint $table) {
            $table
                ->foreign('channel_id', 'shared_channels_foreign_channel_id')
                ->references('channel_id')
                ->on('channels')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shared_channels', function (Blueprint $table) {
            $table->dropForeign('shared_channels_foreign_channel_id');
        });
    }
};
