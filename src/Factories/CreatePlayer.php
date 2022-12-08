<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Factories;

use Jcharcosset\Battle\Contracts\Cards;
use Jcharcosset\Battle\HandCard;
use Jcharcosset\Battle\Player;

final class CreatePlayer
{
    public function __construct(protected Cards $card)
    {
        $this->card->addPlayer();
    }

    public function create(string $name): Player
    {
        $handCard = new HandCard($this->card);
        return (new Player($handCard))->setName($name);
    }
}
