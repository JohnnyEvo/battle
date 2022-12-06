<?php

namespace Jcharcosset\Battle\Contracts;

interface CardInterface
{
    public function distribute(): array;
    public function addPlayer(): self;
    public function removePlayer(): self;
}
