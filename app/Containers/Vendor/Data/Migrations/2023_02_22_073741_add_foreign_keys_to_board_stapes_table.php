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
        Schema::connection('pgsql_app')->table('board_stapes', static function (Blueprint $table) {
            $table
                ->foreign('board_id', 'board_steps_foreign_board_id')
                ->references('board_id')
                ->on('boards')
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
        Schema::connection('pgsql_app')->table('board_stapes', function (Blueprint $table) {
            $table->dropForeign('board_steps_foreign_board_id');
        });
    }
};
