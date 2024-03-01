<?php

declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Core\Abstract\AbstractModel;

/**
 * Src\Models\Participant
 *
 * @property-read \Src\Models\Channel|null $channel
 * @property-read \Src\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Participant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Participant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Participant query()
 * @property int $participant_id
 * @property int $channel_id
 * @property int $user_id
 * @property string $created_id
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereParticipantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereUserId($value)
 * @mixin \Eloquent
 */
class Participant extends AbstractModel
{
    protected $primaryKey = 'participant_id';

    protected $fillable = ['channel_id', 'user_id'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'channel_id');
    }
}