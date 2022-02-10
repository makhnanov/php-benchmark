<?php

declare(strict_types=1);

namespace App\Benches;

use App\Consumers\ArrayConsumer;

class JsonEncodeVsHttpBuildQueryBench
{
    public function benchHttpBuildQuery(): string
    {
        return http_build_query(ArrayConsumer::consumeArrayFour());
    }

    public function benchJsonEncode(): string
    {
        return json_encode(ArrayConsumer::consumeArrayFour());
    }
}
