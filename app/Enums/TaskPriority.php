<?php

namespace App\Enums;

enum TaskPriority: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public function label(): string
    {
        return match ($this) {
            self::LOW => 'Low',
            self::MEDIUM => 'Medium',
            self::HIGH => 'High',
        };
    }

    /** @return array{value:string, label:string} */
    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'label' => $this->label(),
        ];
    }

    /** @return array<int, array{value:string, label:string}> */
    public static function toSelectedArrays(): array
    {
        return array_map(fn ($case) => $case->toArray(), self::cases());
    }
}
