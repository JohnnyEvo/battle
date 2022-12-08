<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Outputs;

use Jcharcosset\Battle\Contracts\Output as OutputInterface;
use Jcharcosset\Battle\Contracts\Score as ScoreInterface;
use Jcharcosset\Battle\Utils\UseHighArrayElements;

final class ScoreOutput extends StringOutput implements OutputInterface
{
    use UseHighArrayElements;

    public function __construct(private ScoreInterface $score)
    {
        $this->message = $this->buildMessage();
    }

    private function buildMessage(): string
    {
        $result = $this->getResult();

        $messages = '';
        foreach ($this->score->all() as $name => $score) {
            $messages .= "{$name} à {$score}.\n";
        }

        if (count($result) === 1) {
            return $messages . "Le gagnant est {$result[0]}.";
        }

        if (count($result) !== count($this->score->all())) {
            $winners = implode(', ', $result);
            return $messages . "Les gagnants sont {$winners}.";
        }

        return $messages . 'Egalité !';
    }

    private function getResult(): array
    {
        return $this->getHighArrayElement($this->score->all());
    }
}
