<?php

namespace studxxx\conditionclient\Delimiters;

class ANDDelimiter implements DelimiterInterface
{
    use DelimiterTrait;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function filter(): array
    {
        $operations = array_merge($this->operators, $this->conditions);
        foreach ($operations as $operation) {
            $operation->setData($this->data);
            $this->data = $operation->filter();
            if (!$this->check()) {
                return $this->data;
            }
        }
        return $this->data;
    }
}
