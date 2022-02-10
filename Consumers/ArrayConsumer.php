<?php

namespace App\Consumers;

class ArrayConsumer
{
    public static function consumeNotEmpty(): int
    {
        return count([1, 2, 3, 4, 5, rand(1, 10)]);
    }

    public static function consumeEmpty(): int
    {
        return count([]);
    }

    public static function consumeArrayFour(): array
    {
        return [
            'a' => rand(0, 1),
            'b' => 'b',
            'c' => 'c',
            'd' => rand(0, 1),
        ];
    }
}
