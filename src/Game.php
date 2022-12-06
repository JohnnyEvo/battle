<?php

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\FighterInterface;
use Jcharcosset\Battle\Contracts\GameInterface;
use Jcharcosset\Battle\Contracts\PlayerInterface;
use Jcharcosset\Battle\Contracts\ResultInterface;
use Jcharcosset\Battle\Contracts\ScoreInterface;
use Jcharcosset\Battle\Exceptions\NoCardsException;
use Jcharcosset\Battle\Utils\useHighArrayElements;

class Game implements GameInterface
{
    use useHighArrayElements;

    protected array $players;
    protected ResultInterface $result;

    public function __construct(
        protected FighterInterface $fighter,
        protected ScoreInterface $score,
    ) {
        $this->players = $this->fighter->getPlayers();

        foreach ($this->players as $player) {
            /** @var PlayerInterface $player */
            $player->getHandCards()->generateHandCards();
        }
    }

    public function fight(): ScoreInterface
    {
        try {
            $pickCards = $this->pickCards();
            $winners = $this->getWinners($pickCards);

            foreach ($winners as $winner) {
                $this->score->add($winner);
            }
        } catch (NoCardsException) {
            return $this->score;
        }

        $this->fight();

        return $this->score;
    }

    private function pickCards(): array
    {
        $cards = [];

        foreach ($this->players as $player) {
            /** @var PlayerInterface $player */
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
