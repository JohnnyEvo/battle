<?php

namespace Jcharcosset\Battle\Contracts;

interface ScoreInterface
{
    public function add(string $name, int $point): void;

    public function all(): array;

    public function get(string $name): array;
}
