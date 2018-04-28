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
        foreach ($this->operators as $operator) {
            $operator->setData($this->data);
            $this->data = $operator->getData();
        }

        if (!$this->check()) {
            return $this->data;
        }

        foreach ($this->conditions as $condition) {
            $condition->setData($this->data);
            $this->data = $condition->getData();
        }

        return $this->data;
    }
}
