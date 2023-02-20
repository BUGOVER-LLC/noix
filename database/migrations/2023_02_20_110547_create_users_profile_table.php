<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_profile', static function (Blueprint $table) {
            $table->id('user_profile_id')->index('users_profile_index_user_profile_id');
            $table->unsignedBigInteger('user_id')->index('users_profile_index_user_id');
            $table->string('photo', 300)->nullable();
            $table->string('viewed_name', 300)->nullable();
            $table->string('role')->nullable();
            $table->timeTz('t_zone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_profile');
    }
};
