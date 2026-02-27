<?php

namespace App\Dtos\Orders;

use App\Enums\OrderStatusEnum;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class OrderDto extends Data
{
    public function __construct(
        public OrderStatusEnum $status,
    )
    {
    }
}
