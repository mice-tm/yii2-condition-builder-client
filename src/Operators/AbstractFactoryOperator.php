<?php

namespace studxxx\conditionclient\Operators;

abstract class AbstractFactoryOperator
{
    const EQUAL = '=';
    const IN = 'in';

    protected $operator;
    protected $data;
    protected $params;

    /**
     * AbstractFactoryOperator constructor.
     * @param string $operator
     * @param array $data
     * @param array $params
     * @throws \Exception
     */
    public function __construct(string $operator, array $data, $params = [])
    {
        $this->data = $data;
        $this->params = $params;
        $this->operator = $operator;

        if (!$operator) {
            throw new \Exception('Operator must be set!');
        }
    }

    abstract public function getOperator(): OperatorInterface;

    public function isEqualOperator(): bool
    {
        return self::EQUAL === $this->operator;
    }

    public function isInOperator(): bool
    {
        return self::IN === $this->operator;
    }
}
