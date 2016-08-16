<?php

namespace Vanguard\Support\Enum;

class UserStatus
{
    const UNCONFIRMED = 'Unconfirmed';
    const ACTIVE = 'Active';
    const BANNED = 'Banned';

    public static function lists()
    {
        return [
            self::ACTIVE => self::ACTIVE,
            self::BANNED => self::BANNED,
            self::UNCONFIRMED => self::UNCONFIRMED
        ];
    }
}