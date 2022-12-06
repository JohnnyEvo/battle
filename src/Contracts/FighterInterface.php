<?php

namespace Jcharcosset\Battle\Contracts;

interface FighterInterface
{
    public function getPlayers(): array;

    public function addPlayer(PlayerInterface $player): void;
}
