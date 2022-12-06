<?php

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\FighterInterface;
use Jcharcosset\Battle\Contracts\PlayerInterface;

class Fighter implements FighterInterface
{
    protected array $players;

    public function getPlayers(): array
    {
        return $this->players;
    }

    public function addPlayer(PlayerInterface $player): void
    {
        $this->players[] = $player;
    }
}
