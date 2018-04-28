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

        $this->tester->assertInstanceOf('studxxx\conditionclient\Operators\FactoryOperator', $factory);
        $this->tester->assertInstanceOf($class, $condition);
    }

    public static function dataProviderOperators()
    {
        return [
            [
                FactoryOperator::EQUAL,
                ['items' => ['namespace' => 'products']],
                ["attribute" => "items.namespace", "comparison" => FactoryOperator::EQUAL, "value" => "products", "conditions" => [] ],
                'studxxx\conditionclient\Operators\EqualOperator'
            ],
            [
                FactoryOperator::EQUAL,
                ["price_variant" => "exclusive"],
                ["attribute" => "price_variant", "comparison" => FactoryOperator::EQUAL, "value" => "exclusive", "conditions" => [] ],
                'studxxx\conditionclient\Operators\EqualOperator'
            ],
            [
                FactoryOperator::IN,
                ['items' => ['namespace' => ['products']]],
                ["attribute" => "items.namespace", "comparison" => FactoryOperator::IN, "value" => ["products", "services"], "conditions" => [] ],
                'studxxx\conditionclient\Operators\InOperator'
            ],
            [
                FactoryOperator::IN,
                ['items' => ['properties' => ['features' => ['Responsive', 'Search Engine Friendly']]]],
                ["attribute" => "items.properties.features", "comparison" => FactoryOperator::IN, "value" => ["Responsive", "Admin Panel"], "conditions" => [] ],
                'studxxx\conditionclient\Operators\InOperator'
            ],
            [
                FactoryOperator::IN,
                ['price_variant' => 'exclusive'],
                ["attribute" => "price_variant", "comparison" => FactoryOperator::IN, "value" => ["exclusive", "buyout"], "conditions" => [] ],
                'studxxx\conditionclient\Operators\InOperator'
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
}
