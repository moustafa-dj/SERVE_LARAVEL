<?php

namespace App\Enums\Employee;

enum Status: int
{
    case ACTIVE = 1;
    case PENDING = 2;
    case INACTIVE = 3;
    case ACCEPTED = 4;
    case REFUSED = 5;

    public static function values(): array
    {
        return array_map(
            static fn (self $item) => $item->value,
            self::cases()
        );
    }

    public static function colors(): array
    {
        return [
            self::ACTIVE->value => 'success',
            self::INACTIVE->value => 'warning',
            self::PENDING->value => 'primary',
            self::REFUSED->value => 'danger',
            self::ACCEPTED->value => 'info'
        ];
    }

    public static function color($key): string
    {
        $key = $key instanceof self ? $key->value : $key;
        return self::colors()[$key] ?? 'primary';
    }

}