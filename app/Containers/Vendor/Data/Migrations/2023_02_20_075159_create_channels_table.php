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
        Schema::connection('pgsql_app')->create('channels', function (Blueprint $table) {
            $table->id('channel_id')->index('channels_index_channel_id');
            $table->bigInteger('workspace_id')->index('channels_index_workspace_id');
            $table->bigInteger('creator_id')->index('channels_index_creator_id');
            $table->uuid('uid')->index('channels_index_uid');
            $table->string('name', 500)->unique();
            $table->enum('status', ['active', 'archive', 'trashed']);
            $table->unsignedTinyInteger('total_connected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the Migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('channels');
    }
};
