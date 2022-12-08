<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Contracts;

interface Output
{
    public function handle(): string;
}
