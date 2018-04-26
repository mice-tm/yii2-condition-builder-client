<?php

namespace studxxx\conditionclient;

class Comparision
{
    public $product;
    public $condition;
    public $attribute;
    public $value;
    public $comparision;
    public $result = false;

    public function __construct($condition, $product)
    {
        $this->product = $product;
        $this->condition = $condition;
        $this->attribute = $this->condition['attribute'];
        $this->value = $this->condition['value'];
        $this->comparision = $this->condition['comparison'];
    }

    public function init()
    {
        if ($this->comparision === '=') {
            $this->setEqualChecking($this->value, $this->product);
        }

        if ($this->comparision === 'in') {
            $this->setInChecking($this->value, $this->product);
        }
    }

    public function check()
    {
        $this->init();
        return $this->result;
    }

    public function setEqualChecking($value, $productParams)
    {
        foreach ($productParams as $productParam) {
            if ($productParam['value'] === $value) {
                return true;
            }
        }
        return false;
    }

    public function setInChecking($value, $productParams)
    {
        $this->result = in_array($this->getColumn($productParams), $value);
    }

    public function getProductParams()
    {
        $attributes = explode('.', $this->attribute);
        $values = $this->product[array_shift($attributes)];

        return array_filter($values, function ($item) use ($attributes) {
            return $item['displayName'] === array_shift($attributes);
        });
    }

    public function getColumn($params)
    {
        $result = [];
        foreach ($params as $param) {
            $result[] = $param['value'];
        }
        return $result;
    }
}
