<?php

namespace studxxx\conditionclient\Delimiters;

class ANDDelimiter implements DelimiterInterface
{
    private $data = [];
    /** @var \studxxx\conditionclient\Operators\OperatorInterface[] */
    private $operators;
    /** @var DelimiterInterface[] */
    private $conditions;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        foreach ($this->operators as $operator) {
            $operator->setData($this->data);
            $this->data = $operator->getData();
        }

        if (!$this->check()) {
            return $this->data;
        }

        foreach ($this->conditions as $condition) {
            $condition->setData($this->data);
            $this->data = $condition->getData();
        }

        return $this->data;
    }

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
