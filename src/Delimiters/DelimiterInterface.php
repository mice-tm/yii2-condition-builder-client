<?php

namespace studxxx\conditionclient\Delimiters;

interface DelimiterInterface
{
    public function check(): bool;

    public function filter(): array;

    public function setData(array $data): void;

    public function setOperator($operator): void;

    public function setCondition($condition): void;
}
