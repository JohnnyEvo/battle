<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Contracts;

interface Fighter
{
    public function getPlayers(): array;

    public function addPlayer(Player $player): void;
}
