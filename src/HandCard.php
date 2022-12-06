<?php

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\CardInterface;
use Jcharcosset\Battle\Contracts\HandCardInterface;
use Jcharcosset\Battle\Exceptions\NoCardsException;

class HandCard implements HandCardInterface
{
    protected array $handCards;

    public function __construct(protected CardInterface $card)
    {
    }

    /**
     * @throws NoCardsException
     */
    public function pickCard(): int
    {
        if(empty($this->handCards)) {
            throw new NoCardsException();
        }

        $cardPicked = $this->handCards[0];
        array_shift($this->handCards);

        return $cardPicked;
    }

    public function generateHandCards(): void
    {
        $this->handCards = $this->card->distribute();
    }
}
