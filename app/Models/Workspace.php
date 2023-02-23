<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Service\Models\Entity\ServiceModel;

class Workspace extends ServiceModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'workspace_id';
    /**
     * @var string[]
     */
    protected $fillable = [
        'workspace_id',
        'creator_id',
        'uid',
        'name',
    ];

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'creator_id');
    }

    /**
     * @return HasMany
     */
    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class, 'workspace_id', 'workspace_id');
    }

    /**
     * @return HasMany
     */
    public function boards(): HasMany
    {
        return $this->hasMany(Channel::class, 'workspace_id', 'workspace_id');
    }
}
