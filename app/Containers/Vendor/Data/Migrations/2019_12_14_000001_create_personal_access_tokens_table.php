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
        Schema::connection('pgsql_app')->create('personal_access_tokens', function (Blueprint $table) {
            $table->id('personal_access_token_id')->index('personal_access_tokens_index_personal_access_token_id');
            $table->unsignedBigInteger('user_id')->index('personal_access_tokens_index_user_id');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the Migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('personal_access_tokens');
    }
};
