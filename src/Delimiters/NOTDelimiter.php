<?php

namespace studxxx\conditionclient\Delimiters;

use yii\helpers\VarDumper;

class NOTDelimiter implements DelimiterInterface
{
    private $data = [];
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
        $items = [];
        foreach ($this->operators as $operator) {
            /** @var \studxxx\conditionclient\Operators\OperatorInterface $operator */
            $operator->setData($this->data);
            $notData = $operator->getData();
            foreach ($this->data['items'] as $item) {
                if (!in_array($item, $notData['items'])) {
                    $items[] = $item;
                }
            }
            $this->data['items'] = $items;
        }

        if (!$this->check()) {
            return $this->data;
        }

        foreach ($this->conditions as $condition) {
            $condition->setData($this->data);
            $this->data = array_diff($this->data, $condition->getData());
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
