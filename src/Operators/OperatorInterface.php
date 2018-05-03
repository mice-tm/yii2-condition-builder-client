<?php

namespace studxxx\conditionclient\Operators;

interface OperatorInterface
{
    public function filter(): array;

    public function setData(array $data): void;
}
