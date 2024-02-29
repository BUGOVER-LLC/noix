<?php

declare(strict_types=1);

namespace Src\Http\Action;

use Illuminate\Support\Str;
use Infrastructure\Jobs\SendMailQueue;
use Redis;
use RedisException;
use Src\Core\Enum\EmailType;
use Src\Http\DTO\CheckEmailDTO;

class CheckEmailAction
{
    /**
     * @throws RedisException
     */
    public function __construct(protected readonly Redis $redis)
    {
        $this->redis->connect('localhost');
    }

    /**
     * @throws RedisException
     */
    public function execute(CheckEmailDTO $dto)
    {
        $accept_code = Str::random(6);

        $this->redis->hMSet(
            EmailType::acceptCodeEmail->value . ':' . $dto->authenticator,
            [
                'code' => igbinary_serialize($accept_code),
                'auth' => igbinary_serialize($dto->authenticator),
                'email' => igbinary_serialize($dto->email),
            ]
        );
        $this->redis->expire(EmailType::acceptCodeEmail->value . ':' . $dto->authenticator, 360);

        SendMailQueue::dispatch(
            EmailType::acceptCodeEmail->value,
            $dto->email,
            ['accept_code' => $accept_code]
        );
    }
}
