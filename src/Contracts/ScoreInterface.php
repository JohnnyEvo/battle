<?php

namespace Jcharcosset\Battle\Contracts;

interface ScoreInterface
{
    public function add(string $name, int $point = 1): void;

    public function all(): array;

    public function get(string $name): array;
}
