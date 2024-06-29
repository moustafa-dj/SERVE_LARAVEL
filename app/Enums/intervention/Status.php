<?php

namespace App\Enums\Intervention;

enum Status: int
{
    case PENDING = 1;
    case IN_PROGRESS = 2;
    case FINISHED = 3;


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
            self::PENDING->value => 'success',
            self::IN_PROGRESS->value => 'warning',
            self::FINISHED->value => 'danger',
        ];
    }

    public static function color($key): string
    {
        $key = $key instanceof self ? $key->value : $key;
        return self::colors()[$key] ?? 'primary';
    }

}