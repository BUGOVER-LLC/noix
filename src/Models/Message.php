<?php

declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Core\Abstracts\AbstractModel;

class Message extends AbstractModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'message_id';
    /**
     * @var string[]
     */
    protected $fillable = ['author_id', 'channel_id', 'workspace_id', 'parent_id', 'body'];

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'author_id');
    }

    /**
     * @return BelongsTo
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'channel_id');
    }

    /**
     * @return BelongsTo
     */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class, 'workspace_id', 'workspace_id');
    }
}
