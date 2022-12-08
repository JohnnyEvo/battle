<?php

declare(strict_types=1);

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\Cards;
use Jcharcosset\Battle\Contracts\HandCard as HandCardInterface;
use Jcharcosset\Battle\Exceptions\NoCards;

final class HandCard implements HandCardInterface
{
    private array $handCards;

    public function __construct(protected Cards $card)
    {
    }

    /**
     * @throws NoCards
     */
    public function pickCard(): int
    {
        if (count($this->handCards) === 0) {
            throw new NoCards();
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
