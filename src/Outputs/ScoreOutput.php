<?php

namespace Jcharcosset\Battle\Outputs;

use Jcharcosset\Battle\Contracts\OutputInterface;
use Jcharcosset\Battle\Contracts\ScoreInterface;
use Jcharcosset\Battle\Utils\useHighArrayElements;

final class ScoreOutput extends StringOutput implements OutputInterface
{
    use useHighArrayElements;

    public function __construct(private ScoreInterface $score)
    {
        $this->message = $this->buildMessage();
    }

    private function buildMessage(): string
    {
        $result = $this->getResult();

        $messages = '';
        foreach ($this->score->all() as $name => $score) {
            $messages .= "$name à $score.\n";
        }

        if(count($result) === 1) {
            return $messages . "Le gagnant est {$result[0]}.";
        }

        if(count($result) !== count($this->score->all())) {
            $winners = implode(", ", $result);
            return $messages . "Les gagnants sont {$winners}.";
        }

        return $messages . "Egalité !";
    }

    private function getResult(): array
    {
        return $this->getHighArrayElement($this->score->all());
    }
}
