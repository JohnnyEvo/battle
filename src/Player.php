<?php

declare(strict_types=1);

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\HandCard;
use Jcharcosset\Battle\Contracts\Player as PlayerInterface;

final class Player implements PlayerInterface
{
    private string $name;

    public function __construct(protected HandCard $handCard)
    {
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHandCards(): HandCard
    {
        return $this->handCard;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
