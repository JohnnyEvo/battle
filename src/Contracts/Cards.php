<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Contracts;

interface Cards
{
    public function distribute(): array;
    public function addPlayer(): self;
    public function removePlayer(): self;
}
