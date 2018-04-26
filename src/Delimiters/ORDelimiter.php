<?php

namespace studxxx\conditionclient\Delimiters;

use yii\helpers\ArrayHelper;

class ORDelimiter implements DelimiterInterface
{
    private $data;
    /** @var \studxxx\conditionclient\Operators\OperatorInterface[] */
    private $operators = [];
    /** @var DelimiterInterface[] */
    private $conditions = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        $operations = array_merge($this->operators, $this->conditions);
        foreach ($operations as $operation) {
            /** DelimiterInterface|\studxxx\conditionclient\Operators\OperatorInterface $operation */
            $operation->setData($this->data);
            $this->data = ArrayHelper::merge($this->data, $operation->getData());
        }
//        foreach ($this->operators as $operator) {
//            $operator->setData($this->data);
//            $this->data = ArrayHelper::merge($this->data, $operator->getData());
//        }
//
//        foreach ($this->conditions as $condition) {
//            $condition->setData($this->data);
//            $this->data = ArrayHelper::merge($this->data, $condition->getData());
//        }
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
