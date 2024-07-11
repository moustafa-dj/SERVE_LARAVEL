<?php

namespace App\Enums\Order;

enum Status: int
{
    case PENDING = 1;
    case ACCEPTED = 2;
    case REFUSED = 3;
    case FINISHED = 4;
    case IN_PROGRESS = 5;
    case CANCELED = 6;


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
            self::PENDING->value => 'warning',
            self::ACCEPTED->value => 'primary',
            self::REFUSED->value => 'danger',
            self::FINISHED->value => 'success',
            self::IN_PROGRESS->value => 'info',
            self::CANCELED->value => 'secondary',
        ];
    }

    public static function color($key): string
    {
        $key = $key instanceof self ? $key->value : $key;
        return self::colors()[$key] ?? 'primary';
    }

}