<?php

namespace Jcharcosset\Battle\Factories;

use Jcharcosset\Battle\Contracts\CardInterface;
use Jcharcosset\Battle\Contracts\PlayerInterface;
use Jcharcosset\Battle\HandCard;
use Jcharcosset\Battle\Player;

class CreatePlayer
{
    public function __construct(protected CardInterface $card)
    {
        $this->card->addPlayer();
    }

    public function create(string $name): PlayerInterface
    {
        $handCard = new HandCard($this->card);
        return (new Player($handCard))->setName($name);
    }
}
