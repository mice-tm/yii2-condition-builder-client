<?php

namespace studxxx\conditionclient\Operators;

class FactoryOperator extends AbstractFactoryOperator
{
    /**
     * @return OperatorInterface
     * @throws \Exception
     */
    public function getOperator(): OperatorInterface
    {
        if ($this->isEqualOperator()) {
            return new EqualOperator($this->data, $this->params);
        }

        if ($this->isInOperator()) {
            return new InOperator($this->data, $this->params);
        }
        throw new \Exception('Operator is not found');
    }
}
