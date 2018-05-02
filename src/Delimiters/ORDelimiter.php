<?php

namespace studxxx\conditionclient\Delimiters;

use yii\helpers\ArrayHelper;

class ORDelimiter implements DelimiterInterface
{
    use DelimiterTrait;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        $operations = array_merge($this->operators, $this->conditions);
        $data = [];
        foreach ($operations as $operation) {
            /** DelimiterInterface|\studxxx\conditionclient\Operators\OperatorInterface $operation */
            $operation->setData($this->data);
            $item = $operation->getData();
            $data = ArrayHelper::merge($data, $item);
        }
        return $data;
    }
}
