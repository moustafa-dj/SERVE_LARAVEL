<?php

namespace App\Enums\Domain;

enum Status: int
{
    case ACTIVE = 1;
    case INACTIVE = 2;

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
            self::INACTIVE->value => 'warning'
        ];
    }

    public static function color($key): string
    {
        $key = $key instanceof self ? $key->value : $key;
        return self::colors()[$key] ?? 'primary';
    }

}