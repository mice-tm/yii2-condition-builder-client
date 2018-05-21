<?php
namespace Operators;

use Codeception\Test\Unit;
use studxxx\conditionclient\Delimiters\DelimiterInterface;
use studxxx\conditionclient\Operators\FactoryOperator;

class FactoryOperatorTest extends Unit
{
    const FAIL_OPERATOR = 'fail';
    /** @var array */
    public $data = [];

    /** @var DelimiterInterface */
    protected $delimiter;

    /** @var \Unitunit */
    protected $tester;

    /**
     * @dataProvider dataProviderOperators
     * @param string $operator
     * @param array $data
     * @param array $params
     * @param string $class
     * @throws \Exception
     */
    public function testCreateOperatorSuccess($operator, $data, $params, $class)
    {
        $factory = new FactoryOperator($operator, $data, $params);
        $condition = $factory->getOperator();
        $result = $condition->filter();

        $this->tester->assertInstanceOf('studxxx\conditionclient\Operators\FactoryOperator', $factory);
        $this->tester->assertInstanceOf($class, $condition);
        $this->tester->assertNotEmpty($result['items']);
    }

    public static function dataProviderOperators()
    {
        return [
            'EQUAL: items.namespace = products' => [
                FactoryOperator::EQUAL,
                self::getData(),
                [
                    "attribute" => "items.namespace",
                    "comparison" => FactoryOperator::EQUAL,
                    "value" => "products",
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\EqualOperator'
            ],
            'EQUAL: cart.price_variant = exclusive' => [
                FactoryOperator::EQUAL,
                self::getData(),
                [
                    "attribute" => "cart.price_variant",
                    "comparison" => FactoryOperator::EQUAL,
                    "value" => "exclusive",
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\EqualOperator'
            ],
            'IN: items.namespace = ["products", "services"]' => [
                FactoryOperator::IN,
                self::getData(),
                [
                    "attribute" => "items.namespace",
                    "comparison" => FactoryOperator::IN,
                    "value" => ["products", "services"],
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\InOperator'
            ],
            'IN: items.properties.features = ["Responsive", "Admin Panel"]' => [
                FactoryOperator::IN,
                self::getData(),
                [
                    "attribute" => "items.properties.features",
                    "comparison" => FactoryOperator::IN,
                    "value" => ["Responsive", "Admin Panel"],
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\InOperator'
            ],
            'IN: cart.price_variant = ["exclusive", "buyout"]' => [
                FactoryOperator::IN,
                self::getData(),
                [
                    "attribute" => "cart.price_variant",
                    "comparison" => FactoryOperator::IN,
                    "value" => ["exclusive", "buyout"],
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\InOperator'
            ],
            'Less than: cart.total < 10 ' => [
                FactoryOperator::LESS_THAN,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::LESS_THAN,
                    "value" => 10,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\LessThanOperator'
            ],
            'Less than or equal: cart.total <= 10 ' => [
                FactoryOperator::LESS_THAN_OR_EQUAL,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::LESS_THAN_OR_EQUAL,
                    "value" => 10,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\LessThanOrEqualOperator'
            ],
            'Less than or equal: cart.total <= 9 ' => [
                FactoryOperator::LESS_THAN_OR_EQUAL,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::LESS_THAN_OR_EQUAL,
                    "value" => 9,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\LessThanOrEqualOperator'
            ],
            'Greater than: cart.total > 8' => [
                FactoryOperator::GREATER_THAN,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::GREATER_THAN,
                    "value" => 8,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\GreaterThanOperator'
            ],
            'Greater than or equal: cart.total >= 8 ' => [
                FactoryOperator::GREATER_THAN_OR_EQUAL,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::GREATER_THAN_OR_EQUAL,
                    "value" => 8,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\GreaterThanOrEqualOperator'
            ],
            'Greater than or equal: cart.total >= 9 ' => [
                FactoryOperator::GREATER_THAN_OR_EQUAL,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::GREATER_THAN_OR_EQUAL,
                    "value" => 9,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\GreaterThanOrEqualOperator'
            ],
        ];
    }

    /**
     * @dataProvider dataProviderWithEmptyResult
     * @param string $operator
     * @param array $data
     * @param array $params
     * @param string $class
     * @throws \Exception
     */
    public function testCreateOperatorWithEmptyResult($operator, $data, $params, $class)
    {
        $factory = new FactoryOperator($operator, $data, $params);
        $condition = $factory->getOperator();
        $result = $condition->filter();

        $this->tester->assertInstanceOf('studxxx\conditionclient\Operators\FactoryOperator', $factory);
        $this->tester->assertInstanceOf($class, $condition);
        $this->tester->assertEmpty($result['items']);
    }

    public static function dataProviderWithEmptyResult()
    {
        return [
            'equal: param not exist items.properties.types' => [
                FactoryOperator::EQUAL,
                self::getData(),
                [
                    "attribute" => "items.properties.types",
                    "comparison" => FactoryOperator::EQUAL,
                    "value" => "Drupal Templates",
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\EqualOperator'
            ],
            'equal: items.properties.types != "Drupal Templates"' => [
                FactoryOperator::EQUAL,
                self::getData(),
                [
                    "attribute" => "items.properties.features",
                    "comparison" => FactoryOperator::EQUAL,
                    "value" => "Drupal Templates",
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\EqualOperator'
            ],
            'Less than: cart.total < 9' => [
                FactoryOperator::LESS_THAN,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::LESS_THAN,
                    "value" => 9,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\LessThanOperator'
            ],
            'Less than: cart.total < 8' => [
                FactoryOperator::LESS_THAN,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::LESS_THAN,
                    "value" => 8,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\LessThanOperator'
            ],
            'Less than: cart.total <= 8' => [
                FactoryOperator::LESS_THAN_OR_EQUAL,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::LESS_THAN_OR_EQUAL,
                    "value" => 8,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\LessThanOrEqualOperator'
            ],
            'greater than: cart.total > 9' => [
                FactoryOperator::GREATER_THAN,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::GREATER_THAN,
                    "value" => 9,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\GreaterThanOperator'
            ],
            'greater than: cart.total > 10' => [
                FactoryOperator::GREATER_THAN,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::GREATER_THAN,
                    "value" => 10,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\GreaterThanOperator'
            ],
            'greater than or equal: cart.total >= 10' => [
                FactoryOperator::GREATER_THAN_OR_EQUAL,
                self::getData(),
                [
                    "attribute" => "cart.total",
                    "comparison" => FactoryOperator::GREATER_THAN_OR_EQUAL,
                    "value" => 10,
                    "conditions" => []
                ],
                'studxxx\conditionclient\Operators\GreaterThanOrEqualOperator'
            ],
        ];
    }

    /**
     * @throws \Exception
     */
    public function testCreateUnusedOperatorFail()
    {
        $this->expectException('\Exception');
        $this->expectExceptionMessage('Operator is not found');
        $factory = new FactoryOperator(self::FAIL_OPERATOR, [], []);
        $factory->getOperator();
    }

    /**
     * @throws \Exception
     */
    public function testCreateWithEmptyOperatorFail()
    {
        $this->expectException('\Exception');
        $this->expectExceptionMessage('Operator must be set!');
        $factory = new FactoryOperator('', [], []);
        $factory->getOperator();
    }

    protected static function getData()
    {
        return [
            'cart.price_variant' => 'exclusive',
            'cart.total' => 9,
            'items' => [
                [
                    'namespace' => 'products',
                    'properties' => [
                        'features' => [
                            'Responsive',
                            'Search Engine Friendly'
                        ]
                    ]
                ]
            ]
        ];
    }
}
