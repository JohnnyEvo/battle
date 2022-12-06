<?php

namespace Jcharcosset\Battle\Outputs;

use Jcharcosset\Battle\Contracts\OutputInterface;

class StringOutput implements OutputInterface
{
    protected string $message = '';

    public function handle(): string
    {
        return $this->message;
    }
}
