<?php
namespace Delimiters;

use Codeception\Stub;
use Codeception\Test\Unit;
use studxxx\conditionclient\Delimiters\DelimiterInterface;
use studxxx\conditionclient\Delimiters\NOTDelimiter;

class NOTDelimiterTest extends Unit
{
    /** @var array */
    public $data = [];

    /** @var DelimiterInterface */
    protected $delimiter;

    /** @var \Unitunit */
    protected $tester;

    protected function _before()
    {
        $this->delimiter = new NOTDelimiter($this->data);
    }

    protected function _after()
    {
    }

    // tests
    public function testInstance()
    {
        $this->tester->assertInstanceOf('studxxx\conditionclient\Delimiters\DelimiterInterface', $this->delimiter);
    }

    /**
     * @dataProvider dataProviderGetData
     * @param $operators
     * @param $conditions
     * @param $data
     */
    public function testGetDataSuccess($operators, $conditions, $data)
    {
        $delimiter = new NOTDelimiter($data);
        foreach ($operators as $operator) {
            $delimiter->setOperator($operator);
        }

        foreach ($conditions as $condition) {
            $delimiter->setCondition($condition);
        }

        $result = $delimiter->filter();
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
        $delimiter = new NOTDelimiter($data);
        foreach ($operators as $operator) {
            $delimiter->setOperator($operator);
        }

        foreach ($conditions as $condition) {
            $delimiter->setCondition($condition);
        }

        $result = $delimiter->filter();
        $this->tester->assertNotEquals($data, $result);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function dataProviderGetData()
    {
        $data = $getData = self::getData();
        $getData['items'] = [];
        return [
            [
                [
                    self::getMockEqualOperator($data, $getData),
                    self::getMockInOperator($data, $getData),
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
        $data = $getData = $getData1 = $getData2 = self::getData();
        unset($getData1['items'][0]);
        unset($getData2['items'][1]);
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
                [self::getMockEqualOperator($data, $getData1), self::getMockInOperator($data, $getData2)],
                [],
                $data,
            ],
            [
                [self::getMockEqualOperator($data, $getData)],
                [],
                $data,
            ],
            [
                [self::getMockInOperator($data, $getData)],
                [],
                $data,
            ],
            [
                [],
                [self::getMockANDDelimiter($data), self::getMockNOTDelimiter($data, $getData1), self::getMockORDelimiter($data, $getData2)],
                $data,
            ],
            [
                [],
                [self::getMockANDDelimiter($data, $getData1), self::getMockNOTDelimiter($data, $getData2), self::getMockORDelimiter($data)],
                $data,
            ],
            [
                [],
                [self::getMockANDDelimiter($data, $getData), self::getMockNOTDelimiter($data), self::getMockORDelimiter($data)],
                $data,
            ],
            [
                [],
                [self::getMockANDDelimiter($data), self::getMockNOTDelimiter($data, $getData), self::getMockORDelimiter($data)],
                $data,
            ],
            [
                [self::getMockEqualOperator($data), self::getMockInOperator($data)],
                [self::getMockANDDelimiter($data), self::getMockNOTDelimiter($data), self::getMockORDelimiter($data, $getData)],
                $data,
            ],
            [
                [self::getMockEqualOperator($data), self::getMockInOperator($data, $getData1)],
                [self::getMockANDDelimiter($data), self::getMockNOTDelimiter($data), self::getMockORDelimiter($data, $getData2)],
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
    public static function getMockEqualOperator($data = [], $getData = ['items' => []], $isItemsFilter = true)
    {
        return Stub::make('studxxx\conditionclient\Operators\EqualOperator', [
            'data' => $data,
            'filter' => function () use ($getData) {
                return $getData;
            },
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
    public static function getMockInOperator($data = [], $getData = ['items' => []], $isItemsFilter = true)
    {
        return Stub::make('studxxx\conditionclient\Operators\InOperator', [
            'data' => $data,
            'filter' => function () use ($getData) {
                return $getData;
            },
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
    public static function getMockANDDelimiter($data = [], $getData = ['items' => []], $operators = [], $conditions = [], $check = true)
    {
        return Stub::make('studxxx\conditionclient\Delimiters\ANDDelimiter', [
            'data' => $data,
            'filter' => function () use ($getData) {
                return $getData;
            },
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
    public static function getMockORDelimiter($data = [], $getData = ['items' => []], $operators = [], $conditions = [], $check = true)
    {
        return Stub::make('studxxx\conditionclient\Delimiters\ORDelimiter', [
            'data' => $data,
            'operators' => $operators,
            'conditions' => $conditions,
            'check' => function () use ($check) {
                return $check;
            },
            'filter' => function () use ($getData) {
                return $getData;
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
     * @return object|\studxxx\conditionclient\Delimiters\NOTDelimiter
     * @throws \Exception
     */
    public static function getMockNOTDelimiter($data = [], $getData = ['items' => []], $operators = [], $conditions = [], $check = true)
    {
        return Stub::make('studxxx\conditionclient\Delimiters\NOTDelimiter', [
            'data' => $data,
            'filter' => function () use ($getData) {
                return $getData;
            },
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

    protected static function getData()
    {
        return [
            'price_variant' => 'exclusive',
            'items' => [
                [
                    'namespace' => 'products',
                    'properties' => [
                        'features' => [
                            'Responsive',
                            'Search Engine Friendly'
                        ]
                    ]
                ],
                [
                    'namespace' => 'service',
                    'properties' => [
                        'features' => [
                            'Big pack',
                        ]
                    ]
                ],
            ]
        ];
    }
}
