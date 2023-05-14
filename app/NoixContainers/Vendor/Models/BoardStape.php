<?php

declare(strict_types=1);

namespace App\NoixContainers\Vendor\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Service\Models\Entity\ServiceModel;

class BoardStape extends ServiceModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'board_stape_id';

    /**
     * @var string[]
     */
    protected $fillable = ['board_id', 'name'];

    /**
     * @return BelongsTo
     */
    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class, 'board_id', 'board_id');
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(BoardTask::class, 'board_task_id', 'strape_id');
    }
}