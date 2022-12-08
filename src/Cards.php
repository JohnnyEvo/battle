<?php

declare(strict_types=1);

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\Cards as CardsInterface;
use Jcharcosset\Battle\Exceptions\MissingCards;
use Jcharcosset\Battle\Exceptions\NoPlayer;
use Jcharcosset\Battle\Exceptions\NotEnoughCards;

final class Cards implements CardsInterface
{
    private array $stack = [];
    private int $card_number;
    private int $player_number = 0;
    private static $instance = null;

    /**
     * @throws MissingCards
     */
    private function __construct()
    {
        if (CONFIG['card_number'] % 2) {
            throw new MissingCards('Oops. Cards are missing from the game');
        }

        $this->card_number = CONFIG['card_number'];

        $this->generate();
        $this->shuffle();
    }

    public static function get(): ?Cards
    {
        if (self::$instance === null) {
            self::$instance = new Cards();
        }

        return self::$instance;
    }

    /**
     * @throws NotEnoughCards
     */
    public function distribute(): array
    {
        $output = array_splice($this->stack, 0, (int) floor($this->card_number / $this->player_number));

        if ($output < $this->card_number / $this->player_number) {
            throw new NotEnoughCards();
        }

        return $output;
    }

    public function addPlayer(): self
    {
        $this->player_number++;

        return $this;
    }

    /**
     * @throws NoPlayer
     */
    public function removePlayer(): self
    {
        $this->player_number--;

        if ($this->player_number <= 0) {
            throw new NoPlayer();
        }

        return $this;
    }

    private function generate(): void
    {
        $this->stack = range(1, CONFIG['card_number']);
    }

    private function shuffle(): void
    {
        shuffle($this->stack);
    }
}
