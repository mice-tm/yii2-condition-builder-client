<?php

namespace studxxx\conditionclient\Delimiters;

trait DelimiterTrait
{
    private $data = [];
    /** @var \studxxx\conditionclient\Operators\OperatorInterface[] */
    private $operators = [];
    /** @var DelimiterInterface[] */
    private $conditions = [];

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function check(): bool
    {
        return !empty($this->data['items']);
    }

    public function setOperator($operator): void
    {
        $this->operators[] = $operator;
    }

    public function setCondition($condition): void
    {
        $this->conditions[] = $condition;
    }
}
