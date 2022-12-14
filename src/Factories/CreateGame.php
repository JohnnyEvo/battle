<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Factories;

use Jcharcosset\Battle\Cards;
use Jcharcosset\Battle\Fighter;
use Jcharcosset\Battle\Game;
use Jcharcosset\Battle\Score;

final class CreateGame
{
    private Fighter $fighter;
    private Score $score;

    public function __construct(string ...$names)
    {
        $this->fighter = new Fighter();
        $this->score = new Score();

        $this->createPlayers($names);
    }

    public function create(): Game
    {
        return new Game($this->fighter, $this->score);
    }

    private function createPlayers(array $names): void
    {
        $card = Cards::get();

        foreach ($names as $name) {
            $player = (new CreatePlayer($card))->create($name);
            $this->fighter->addPlayer($player);
        }
    }
}
