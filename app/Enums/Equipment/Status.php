<?php

namespace App\Enums\Equipment;

enum Status: int
{
    case IN_STOCK = 1;
    case RUNNING_OUT = 2;
    case OUT_OF_STOCK = 3;


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
            self::IN_STOCK->value => 'success',
            self::RUNNING_OUT->value => 'warning',
            self::OUT_OF_STOCK->value => 'danger',
        ];
    }

    public static function color($key): string
    {
        $key = $key instanceof self ? $key->value : $key;
        return self::colors()[$key] ?? 'primary';
    }

}