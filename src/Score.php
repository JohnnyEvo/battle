<?php

declare(strict_types=1);

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\Score as ScoreInterface;

final class Score implements ScoreInterface
{
    private array $score = [];

    public function add(string $name, int $point = 1): void
    {
        if (! array_key_exists($name, $this->score)) {
            $this->score[$name] = 0;
        }

        $this->score[$name] += $point;
    }

    public function all(): array
    {
        return $this->score;
    }

    public function get(string $name): array
    {
        return $this->score[$name];
    }
}
