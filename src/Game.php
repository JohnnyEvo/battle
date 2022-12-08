<?php

declare(strict_types=1);

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\Fighter;
use Jcharcosset\Battle\Contracts\Game as GameInterface;
use Jcharcosset\Battle\Contracts\Player;
use Jcharcosset\Battle\Contracts\Result as ResultInterface;
use Jcharcosset\Battle\Contracts\Score;
use Jcharcosset\Battle\Exceptions\NoCards;
use Jcharcosset\Battle\Utils\UseHighArrayElements;

final class Game implements GameInterface
{
    use UseHighArrayElements;

    protected array $players;
    protected ResultInterface $result;

    public function __construct(
        protected Fighter $fighter,
        protected Score $score,
    ) {
        $this->players = $this->fighter->getPlayers();

        foreach ($this->players as $player) {
            /** @var Player $player */
            $player->getHandCards()->generateHandCards();
        }
    }

    public function fight(): Score
    {
        try {
            $pickCards = $this->pickCards();
            $winners = $this->getWinners($pickCards);

            foreach ($winners as $winner) {
                $this->score->add($winner);
            }
        } catch (NoCards) {
            return $this->score;
        }

        $this->fight();

        return $this->score;
    }

    private function pickCards(): array
    {
        $cards = [];

        foreach ($this->players as $player) {
            /** @var Player $player */
            $cards[$player->getName()] = $player->getHandCards()->pickCard();
        }

        return $cards;
    }

    private function getWinners(array $party): array
    {
        /**
         * returns array to manage equality
         */
        return $this->getHighArrayElement($party);
    }
}
