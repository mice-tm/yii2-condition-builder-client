<?php

namespace studxxx\conditionclient;

use studxxx\conditionclient\Delimiters\DelimiterInterface;

interface ConditionBuilderServiceInterface
{
    const DEFAULT_OPERATOR = 'OR';
    const NOT = 'NOT';
    const AND = 'AND';
    const OR = 'OR';

    public function buildConditions($conditions, $operator = self::DEFAULT_OPERATOR): DelimiterInterface;

    public function buildCompare($condition);

    public function setData($data);
}
