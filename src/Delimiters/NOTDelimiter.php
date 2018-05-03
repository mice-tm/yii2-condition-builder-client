<?php

namespace studxxx\conditionclient\Delimiters;

class NOTDelimiter implements DelimiterInterface
{
    use DelimiterTrait;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function filter(): array
    {
        $items = [];
        foreach ($this->operators as $operator) {
            /** @var \studxxx\conditionclient\Operators\OperatorInterface $operator */
            $operator->setData($this->data);
            $notData = $operator->filter();
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
            $this->data = array_diff($this->data, $condition->filter());
        }
        return $this->data;
    }
}
