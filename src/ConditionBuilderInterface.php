<?php

namespace studxxx\conditionclient;

use studxxx\conditionclient\Delimiters\DelimiterInterface;
use studxxx\conditionclient\Operators\OperatorInterface;

interface ConditionBuilderInterface
{
    const DEFAULT_OPERATOR = 'OR';
    const NOT = 'NOT';
    const AND = 'AND';
    const OR = 'OR';

    public function buildConditions($conditions, $operator = self::DEFAULT_OPERATOR): DelimiterInterface;

    public function buildCompare($condition): OperatorInterface;

    public function setData($data): self;
}
