<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Contracts;

interface Score
{
    public function add(string $name, int $point = 1): void;

    public function all(): array;

    public function get(string $name): array;
}
