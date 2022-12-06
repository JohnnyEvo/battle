<?php

namespace Jcharcosset\Battle\Contracts;

interface PlayerInterface
{
    public function getName(): string;

    public function getHandCards(): HandCardInterface;
}
