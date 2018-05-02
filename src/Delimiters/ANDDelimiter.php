<?php

namespace studxxx\conditionclient\Delimiters;

class ANDDelimiter implements DelimiterInterface
{
    use DelimiterTrait;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        $operations = array_merge($this->operators, $this->conditions);
        foreach ($operations as $operation) {
            $operation->setData($this->data);
            $this->data = $operation->getData();
            if (!$this->check()) {
                return $this->data;
            }
        }
        return $this->data;
    }
}
