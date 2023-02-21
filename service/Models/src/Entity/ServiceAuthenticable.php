<?php

declare(strict_types=1);

namespace Service\Models\Entity;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Service\Models\Traits\ScopeHelpers;
use Service\Role\Traits\HasRoles;

/**
 * Class ServiceAuthenticable
 * @package Service\Messenger
 */
class ServiceAuthenticable extends Authenticable
{
    use ScopeHelpers;
    use HasApiTokens;
    use Notifiable;
    use HasRoles;

    /**
     * @var string[]
     */
    public $socketAuth = [];
    /**
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s.u';

    /**
     * Specifies the user's FCM tokens
     *
     * @return string|null
     * @noinspection PhpUnused
     */
    public function routeNotificationForFcm(): ?string
    {
        return $this->fcm()->first()->key ?? null;
    }
}
