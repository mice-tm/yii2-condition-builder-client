<?php

namespace studxxx\conditionclient\Operators;

interface OperatorInterface
{
    public function getData(): array;

    public function setData(array $data): void;
}
