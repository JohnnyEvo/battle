<?php

namespace Jcharcosset\Battle\Contracts;

interface HandCardInterface
{
    public function generateHandCards(): void;

    public function pickCard(): int;
}
