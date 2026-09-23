<?php

namespace App\Enums;

enum TaskStatus: string
{
    case TODO = 'todo';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::TODO => 'To do',
            self::IN_PROGRESS => 'In Progress',
            self::COMPLETED => 'Completed',
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
