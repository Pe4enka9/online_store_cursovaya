<?php

namespace App\Dtos\Auth;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class RegisterDto extends Data
{
    public function __construct(
        #[Min(18), Max(18), Unique(User::class)]
        public string $phone,
        #[Max(255)]
        public string $name,
        public string $password,
    )
    {
    }

    public static function rules(): array
    {
        return [
            'password' => [Password::min(8)->max(255)->numbers()->symbols(), 'confirmed'],
        ];
    }
}
