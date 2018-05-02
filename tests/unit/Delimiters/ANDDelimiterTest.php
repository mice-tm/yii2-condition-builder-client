<?php
namespace tests\unit\Delimiters;

use Codeception\Stub;
use Codeception\Test\Unit;
use studxxx\conditionclient\Delimiters\ANDDelimiter;
use studxxx\conditionclient\Delimiters\DelimiterInterface;

class ANDDelimiterTest extends Unit
{
    /** @var array */
    public $data = [];

    /** @var DelimiterInterface */
    protected $delimiter;

    /** @var \Unitunit */
    protected $tester;
    
    protected function _before()
    {
        $this->delimiter = new ANDDelimiter($this->data);
    }

    protected function _after()
    {
    }

    public function testInstance()
    {
        $this->tester->assertInstanceOf('studxxx\conditionclient\Delimiters\DelimiterInterface', $this->delimiter);
    }

    /**
     * @dataProvider dataProviderGetData
     * @param array $operators
     * @param array $conditions
     * @param array $data
     */
    public function testGetDataSuccess($operators, $conditions, $data)
    {
        $delimiter = new ANDDelimiter($data);
        foreach ($operators as $operator) {
            $delimiter->setOperator($operator);
        }

        foreach ($conditions as $condition) {
            $delimiter->setCondition($condition);
        }

        $result = $delimiter->getData();
        $this->tester->assertEquals($data, $result);
    }

    /**
     * @dataProvider dataProviderGetDataEmpty
     * @param $operators
     * @param $conditions
     * @param $data
     */
    public function testGetDataEmpty($operators, $conditions, $data)
    {
        $delimiter = new ANDDelimiter($data);
        $delimiter->setData($data);
        foreach ($operators as $operator) {
            $delimiter->setOperator($operator);
        }

        foreach ($conditions as $condition) {
            $delimiter->setCondition($condition);
        }

        $result = $delimiter->getData();
        $this->tester->assertNotEquals($data, $result);
        $this->tester->assertEmpty($result);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function dataProviderGetData()
    {
        $data = $getData = ['items' => ['namespace' => 'products']];
        return [
            [
                [
                    self::getMockEqualOperator($data, $getData),
                    self::getMockInOperator($data, $getData)
                ],
                [],
                $data,
            ],
            [
                [],
                [
                    self::getMockANDDelimiter($data, $getData),
                    self::getMockNOTDelimiter($data, $getData),
                    self::getMockORDelimiter($data, $getData),
                ],
                $data,
            ],
            [
                [
                    self::getMockEqualOperator($data, $getData),
                    self::getMockInOperator($data, $getData)
                ],
                [
                    self::getMockANDDelimiter($data, $getData),
                    self::getMockNOTDelimiter($data, $getData),
                    self::getMockORDelimiter($data, $getData)
                ],
                $data,
            ],
        ];
    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function dataProviderGetDataEmpty()
    {
        $data = $getData = ['items' => ['namespace' => 'products']];
        return [
            [
                [self::getMockEqualOperator($data, $getData), self::getMockInOperator($data)],
                [],
                $data,
            ],
            [
                [self::getMockEqualOperator($data), self::getMockInOperator($data, $getData)],
                [],
                $data,
            ],
            [
                [self::getMockEqualOperator($data), self::getMockInOperator($data)],
                [],
                $data,
            ],
            [
                [self::getMockEqualOperator($data)],
                [],
                $data,
            ],
            [
                [self::getMockInOperator($data)],
                [],
                $data,
            ],
            [
                [],
                [self::getMockANDDelimiter($data), self::getMockNOTDelimiter($data), self::getMockORDelimiter($data)],
                $data,
            ],
            [
                [],
                [self::getMockANDDelimiter($data, $getData), self::getMockNOTDelimiter($data, $getData), self::getMockORDelimiter($data)],
                $data,
            ],
            [
                [],
                [self::getMockANDDelimiter($data, $getData), self::getMockNOTDelimiter($data), self::getMockORDelimiter($data)],
                $data,
            ],
            [
                [],
                [self::getMockANDDelimiter($data), self::getMockNOTDelimiter($data, $getData), self::getMockORDelimiter($data, $getData)],
                $data,
            ],
            [
                [],
                [self::getMockANDDelimiter($data), self::getMockNOTDelimiter($data, $getData), self::getMockORDelimiter($data)],
                $data,
            ],
            [
                [self::getMockEqualOperator($data), self::getMockInOperator($data)],
                [self::getMockANDDelimiter($data), self::getMockNOTDelimiter($data), self::getMockORDelimiter($data)],
                $data,
            ],
            [
                [self::getMockEqualOperator($data), self::getMockInOperator($data)],
                [self::getMockANDDelimiter($data), self::getMockNOTDelimiter($data), self::getMockORDelimiter($data)],
                $data,
            ],
            [
                [self::getMockEqualOperator($data, $getData), self::getMockInOperator($data, $getData)],
                [self::getMockANDDelimiter($data, $getData), self::getMockNOTDelimiter($data, $getData), self::getMockORDelimiter($data)],
                $data,
            ],
        ];
    }

    /**
     * @param array $data
     * @param array $getData
     * @param bool $isItemsFilter
     * @return object|\studxxx\conditionclient\Operators\EqualOperator
     * @throws \Exception
     */
    public static function getMockEqualOperator($data = [], $getData = [], $isItemsFilter = true)
    {
        return Stub::make('studxxx\conditionclient\Operators\EqualOperator', [
            'data' => $data,
            'getData' => $getData,
            'setData' => function ($data) {
                return;
            },
            'isItemsFilter' => $isItemsFilter
        ]);
    }

    /**
     * @param array $data
     * @param array $getData
     * @param bool $isItemsFilter
     * @return object|\studxxx\conditionclient\Operators\InOperator
     * @throws \Exception
     */
    public static function getMockInOperator($data = [], $getData = [], $isItemsFilter = true)
    {
        return Stub::make('studxxx\conditionclient\Operators\InOperator', [
            'data' => $data,
            'getData' => $getData,
            'setData' => function ($data) {
                return;
            },
            'isItemsFilter' => $isItemsFilter
        ]);
    }

    /**
     * @param array $data
     * @param array $getData
     * @param array $operators
     * @param array $conditions
     * @param bool $check
     * @return object|\studxxx\conditionclient\Delimiters\ANDDelimiter
     * @throws \Exception
     */
    public static function getMockANDDelimiter($data = [], $getData = [], $operators = [], $conditions = [], $check = true)
    {
        return Stub::make('studxxx\conditionclient\Delimiters\ANDDelimiter', [
            'data' => $data,
            'getData' => $getData,
            'operators' => $operators,
            'conditions' => $conditions,
            'check' => function () use ($check) {
                return $check;
            },
            'setOperator' => function ($operator) {
                return;
            },
            'setCondition' => function ($condition) {
                return;
            },
            'setData' => function ($data) {
                return;
            },
        ]);
    }

    /**
     * @param array $data
     * @param array $getData
     * @param array $operators
     * @param array $conditions
     * @param bool $check
     * @return object|\studxxx\conditionclient\Delimiters\ORDelimiter
     * @throws \Exception
     */
    public static function getMockORDelimiter($data = [], $getData = [], $operators = [], $conditions = [], $check = true)
    {
        return Stub::make('studxxx\conditionclient\Delimiters\ORDelimiter', [
            'data' => $data,
            'operators' => $operators,
            'conditions' => $conditions,
            'check' => function () use ($check) {
                return $check;
            },
            'getData' => $getData,
            'setOperator' => function ($operator) {
                return;
            },
            'setCondition' => function ($condition) {
                return;
            },
            'setData' => function ($data) {
                return;
            },
        ]);
    }

    /**
     * @param array $data
     * @param array $getData
     * @param array $operators
     * @param array $conditions
     * @param bool $check
     * @return object|\studxxx\conditionclient\Delimiters\NOTDelimiter
     * @throws \Exception
     */
    public static function getMockNOTDelimiter($data = [], $getData = [], $operators = [], $conditions = [], $check = true)
    {
        return Stub::make('studxxx\conditionclient\Delimiters\NOTDelimiter', [
            'data' => $data,
            'getData' => $getData,
            'operators' => $operators,
            'conditions' => $conditions,
            'check' => function () use ($check) {
                return $check;
            },
            'setOperator' => function ($operator) {
                return;
            },
            'setCondition' => function ($condition) {
                return;
            },
            'setData' => function ($data) {
                return;
            },
        ]);
    }
}
