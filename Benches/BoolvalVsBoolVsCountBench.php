<?php

declare(strict_types=1);

namespace App\Benches;

use App\Consumers\ArrayConsumer;

class BoolvalVsBoolVsCountBench
{
    public function benchBoolval(): bool
    {
        $consumer = new ArrayConsumer();
        $a1 = boolval($consumer->consumeEmpty());
        $a2 = boolval($consumer->consumeNotEmpty());
        return $a1 && $a2;
    }

    public function benchBelowNegation(): bool
    {
        $a1 = !ArrayConsumer::consumeEmpty() < 1;
        $a2 = !ArrayConsumer::consumeNotEmpty() < 1;
        return $a1 && $a2;
    }

    public function benchBool(): bool
    {
        $a1 = (bool)ArrayConsumer::consumeEmpty();
        $a2 = (bool)ArrayConsumer::consumeNotEmpty();
        return $a1 && $a2;
    }

    public function benchDoubleNegation(): bool
    {
        $a1 = !!ArrayConsumer::consumeEmpty();
        $a2 = !!ArrayConsumer::consumeNotEmpty();
        return $a1 && $a2;
    }

    public function benchCompareAboveZero(): bool
    {
        $a1 = ArrayConsumer::consumeEmpty() > 0;
        $a2 = ArrayConsumer::consumeNotEmpty() > 0;
        return $a1 && $a2;
    }
}
