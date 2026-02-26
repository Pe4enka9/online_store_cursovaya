<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case PENDING = 'pending';
    case SUCCESS = 'success';
    case FAILED = 'failed';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'В обработке',
            self::SUCCESS => 'Успешно',
            self::FAILED => 'Ошибка',
        };
    }
}
