<?php

namespace studxxx\conditionclient\Operators;

abstract class AbstractFactoryOperator
{
    const EQUAL = '=';
    const IN = 'in';
    const NOT_EQUAL = '!=';
    const LESS_THAN = '<';
    const LESS_THAN_OR_EQUAL = '<=';
    const GREATER_THAN = '>';
    const GREATER_THAN_OR_EQUAL = '>=';

    /** @var string  */
    protected $operator;
    /** @var array */
    protected $data;
    /** @var array */
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

    public function isGreaterThanOperator(): bool
    {
        return self::GREATER_THAN === $this->operator;
    }

    public function isGreaterThanOrEqualOperator(): bool
    {
        return self::GREATER_THAN_OR_EQUAL === $this->operator;
    }

    public function isLessThanOperator(): bool
    {
        return self::LESS_THAN === $this->operator;
    }

    public function isLessThanOrEqualOperator(): bool
    {
        return self::LESS_THAN_OR_EQUAL === $this->operator;
    }

    public function isNotEqualOperator(): bool
    {
        return self::NOT_EQUAL === $this->operator;
    }
}
