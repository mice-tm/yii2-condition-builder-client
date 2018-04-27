<?php

namespace studxxx\conditionclient;

use studxxx\conditionclient\Delimiters\DelimiterInterface;
use studxxx\conditionclient\Operators\FactoryOperator;
use studxxx\conditionclient\Operators\OperatorInterface;

class ConditionBuilder implements ConditionBuilderInterface
{
    private $data = [];

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @param $conditions
     * @param string $operator
     * @return DelimiterInterface
     * @throws \Exception
     */
    public function buildConditions($conditions, $operator = self::DEFAULT_OPERATOR): DelimiterInterface
    {
        $class = __NAMESPACE__ . "\\Delimiters\\" . $operator . 'Delimiter';
        /** @var DelimiterInterface $constructor */
        $constructor = new $class($this->data);
        foreach ($conditions as $condition) {
            if (empty($condition['conditions'])) {
                $constructor->setOperator($this->buildCompare($condition));
            } else {
                $constructor->setCondition($this->buildConditions($condition['conditions'], $condition['operator']));
            }
        }
        return $constructor;
    }

    /**
     * @param array $condition
     * @return OperatorInterface
     * @throws \Exception
     */
    public function buildCompare($condition): OperatorInterface
    {
        $operatorFactory = new FactoryOperator($condition['comparison'], $this->data, $condition);
        return $operatorFactory->getOperator();
    }

    public function setData($data): ConditionBuilderInterface
    {
        $this->data = $data;
        return $this;
    }
}
