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

        if ($this->isLessThanOperator()) {
            return new LessThanOperator($this->data, $this->params);
        }

        if ($this->isLessThanOrEqualOperator()) {
            return new LessThanOrEqualOperator($this->data, $this->params);
        }

        if ($this->isGreaterThanOperator()) {
            return new GreaterThanOperator($this->data, $this->params);
        }

        if ($this->isGreaterThanOrEqualOperator()) {
            return new GreaterThanOrEqualOperator($this->data, $this->params);
        }

        if ($this->isNotEqualOperator()) {
            return new NotEqualOperator($this->data, $this->params);
        }
        throw new \Exception('Operator is not found');
    }
}
