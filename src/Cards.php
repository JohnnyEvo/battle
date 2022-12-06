<?php

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\CardInterface;
use Jcharcosset\Battle\Exceptions\MissingCardsException;
use Jcharcosset\Battle\Exceptions\NoPlayerException;
use Jcharcosset\Battle\Exceptions\NotEnoughCardsException;

class Cards implements CardInterface
{
    private static $instance = null;
    public array $stack = [];
    protected int $card_number;
    protected int $player_number = 0;

    /**
     * @throws MissingCardsException
     */
    private function __construct()
    {
        if (CONFIG['card_number'] % 2) {
            throw new MissingCardsException("Oops. Cards are missing from the game");
        }

        $this->card_number = CONFIG['card_number'];

        $this->generate();
        $this->shuffle();
    }

    private function generate(): void
    {
        $this->stack = range(1, CONFIG['card_number']);
    }

    private function shuffle(): void
    {
        shuffle($this->stack);
    }

    public static function get(): ?Cards
    {
        if (self::$instance == null) {
            self::$instance = new Cards();
        }

        return self::$instance;
    }

    /**
     * @throws NotEnoughCardsException
     */
    public function distribute(): array
    {
        $output = array_splice($this->stack, 0, floor($this->card_number / $this->player_number));

        if ($output < $this->card_number / $this->player_number) {
            throw new NotEnoughCardsException();
        }

        return $output;
    }

    public function addPlayer(): self
    {
        $this->player_number++;

        return $this;
    }

    /**
     * @throws NoPlayerException
     */
    public function removePlayer(): self
    {
        $this->player_number--;

        if ($this->player_number <= 0) {
            throw new NoPlayerException();
        }

        return $this;
    }
}
