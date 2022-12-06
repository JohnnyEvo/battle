<?php

use Jcharcosset\Battle\Factories\CreateGame;
use Jcharcosset\Battle\Outputs\ScoreOutput;

require './vendor/autoload.php';

$game = (new CreateGame("Bob", "Alice"))->create();

$score = $game->fight();

$output = new ScoreOutput($score);

echo $output->handle();
