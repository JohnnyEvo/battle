<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Contracts;

interface Game
{
    public function fight(): Score;
}
