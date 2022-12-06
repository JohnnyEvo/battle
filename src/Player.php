<?php

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\HandCardInterface;
use Jcharcosset\Battle\Contracts\PlayerInterface;

class Player implements PlayerInterface
{
    private string $name;

    public function __construct(protected HandCardInterface $handCard)
    {
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHandCards(): HandCardInterface
    {
        return $this->handCard;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
