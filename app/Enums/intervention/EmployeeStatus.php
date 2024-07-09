<?php

namespace App\Enums\Intervention;

enum EmployeeStatus: int
{
    case ENGAGED = 1;
    case DECLINE = 2;
    case PENDING = 3;

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
            self::PENDING->value => 'danger',
            self::ENGAGED->value => 'success',
            self::DECLINE->value => 'danger',
        ];
    }

    public static function color($key): string
    {
        $key = $key instanceof self ? $key->value : $key;
        return self::colors()[$key] ?? 'primary';
    }

}