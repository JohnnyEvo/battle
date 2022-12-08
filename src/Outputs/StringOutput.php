<?php

declare(strict_types=1);

namespace Jcharcosset\Battle\Outputs;

use Jcharcosset\Battle\Contracts\Output as OutputInterface;

abstract class StringOutput implements OutputInterface
{
    protected string $message = '';

    public function handle(): string
    {
        return $this->message;
    }
}
