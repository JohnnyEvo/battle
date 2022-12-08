<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Contracts;

interface HandCard
{
    public function generateHandCards(): void;

    public function pickCard(): int;
}
