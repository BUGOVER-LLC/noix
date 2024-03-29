<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the Migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection('pgsql_app')->table('boards', function (Blueprint $table) {
            $table
                ->foreign('workspace_id', 'boards_foreign_workspace_id')
                ->references('workspace_id')
                ->on('workspaces')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the Migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->table('boards', function (Blueprint $table) {
            $table->dropForeign('boards_foreign_workspace_id');
        });
    }
};
