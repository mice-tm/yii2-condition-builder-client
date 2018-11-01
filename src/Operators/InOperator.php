<?php

namespace studxxx\conditionclient\Operators;

use yii\helpers\ArrayHelper;

class InOperator implements OperatorInterface
{
    /** @var array */
    private $data;
    /** @var array */
    private $params;

    public function __construct($data, $params)
    {
        $this->data = $data;
        $this->params = $params;
    }

    public function filter(): array
    {
        $params = $this->params;
        if ($this->isItemsFilter()) {
            $items = array_filter($this->data['items'], function ($item) use ($params) {
                $attr = str_replace('items.', '', $params['attribute']);

                if (strpos($attr, '.') !== false) {
                    return count(
                        array_intersect(
                            (array) ArrayHelper::getValue($item, $attr),
                            (array) $params['value']
                        )
                    ) > 0;
                }
                if (empty($item[$attr])) {
                    return false;
                }
                return in_array($item[$attr], $params['value']);
            });
            $this->data['items'] = $items;

            return $this->data;
        }

        $attribute = ArrayHelper::getValue($this->data, $params['attribute']);
        if (!$attribute || !in_array($attribute, $params['value'])) {
            $this->data['items'] = [];
        }
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function isItemsFilter()
    {
        return strpos($this->params['attribute'], 'items.') !== false;
    }
}
