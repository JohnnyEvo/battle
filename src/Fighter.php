<?php

declare(strict_types=1);

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\Fighter as FighterInterface;
use Jcharcosset\Battle\Contracts\Player;

final class Fighter implements FighterInterface
{
    private array $players;

    public function getPlayers(): array
    {
        return $this->players;
    }

    public function addPlayer(Player $player): void
    {
        $this->players[] = $player;
    }
}
