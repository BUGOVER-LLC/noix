<?php

declare(strict_types=1);

namespace App\NoixContainers\Vendor\Repositories\User;

use App\NoixContainers\Vendor\Models\User;
use Illuminate\Contracts\Container\Container;
use Service\Repository\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserContract
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->setContainer($container)
            ->setModel(User::class)
            ->setCacheDriver('redis')
            ->setRepositoryId(User::getTableName());
    }
}