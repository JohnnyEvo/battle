<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Contracts;

interface Player
{
    public function getName(): string;

    public function getHandCards(): HandCard;
}
