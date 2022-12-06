<?php

namespace Jcharcosset\Battle;

use Jcharcosset\Battle\Contracts\ScoreInterface;

class Score implements ScoreInterface
{
    protected array $score = [];

    public function add(string $name, int $point = 1): void
    {
        if(!array_key_exists($name, $this->score)) {
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
