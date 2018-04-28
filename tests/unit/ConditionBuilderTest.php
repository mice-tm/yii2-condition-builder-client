<?php

use Codeception\Test\Unit;
use studxxx\conditionclient\ConditionBuilder;
use studxxx\conditionclient\Operators\FactoryOperator;

class ConditionBuilderTest extends Unit
{
    /** @var array */
    public $data = [];
    /** @var \studxxx\conditionclient\ConditionBuilderInterface */
    protected $builder;
    /** @var \Unitunit */
    protected $tester;

    protected function _before()
    {
        $this->builder = new ConditionBuilder($this->data);
    }

    public function testInstance()
    {
        $this->tester->assertInstanceOf('studxxx\conditionclient\ConditionBuilderInterface', $this->builder);
    }

    public function testBuildCondition()
    {
        $this->builder->setData($this->getData());
        $constructor = $this->builder->buildConditions($this->getCondition());
        $data = $constructor->getData();

//        codecept_debug($data);

    }

    public function testBuildCompare()
    {
//        $this->markTestSkipped('The MySQLi extension is not available.');
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function testSetData()
    {
//        $this->markTestSkipped('The MySQLi extension is not available.');
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    protected function getCondition()
    {
        return [
            [
                "attribute" => "items.namespace",
                "comparison" => FactoryOperator::EQUAL,
                "value" => "products",
                "conditions" => []
            ],
            [
                "attribute" => "price_variant",
                "comparison" => FactoryOperator::EQUAL,
                "value" => "exclusive",
                "conditions" => []
            ],
            [
                "attribute" => "price_variant",
                "comparison" => FactoryOperator::EQUAL,
                "value" => "buyout",
                "conditions" => []
            ],
            [
                "attribute" => "price_variant",
                "comparison" => FactoryOperator::IN,
                "value" => ["exclusive", "buyout"],
                "conditions" => []
            ],
        ];
    }

    protected function getData()
    {
        return [
            "id" => "5ae30a5a1dddf2053d759a73",
            "attributes" => ["affiliate" => "TM"],
            "price_variant" => "exclusive",
            "currency" => "USD",
            "user_id" => 0,
            "status" => "open",
            "total" => [
                "count" => 20,
                "amount" => 3106,
                "sub_total" => 3106
            ],
            "items" => [
                [
                    "price_variant" => "regular",
                    "link" => "http://service-products.dev/api/v2/products/en/66180",
                    "services" => [],
                    "bundles" => [],
                    "id" => 55506,
                    "price" => 199,
                    "final_price" => 199,
                    "updated_at" => 1524828917,
                    "created_at" => 1524828766,
                    "namespace" => "products",
                    "discounts" => [],
                    'properties' => [
                        "functionality" => [
                            "Blog",
                            "Online Store/Shop",
                            "Portfolio",
                            "Blogging",
                            "Corporate"
                        ],
                        "features" => [
                            "Responsive",
                            "Admin Panel",
                            "Search Engine Friendly",
                            "Retina Ready",
                            "WPML ready",
                            "Open Framework",
                            "Long-term support",
                            "Sample Data Installer",
                            "TM Gallery",
                            "Visual Editor",
                            "Cherry Framework 5",
                            "Projects",
                            "Services",
                            "Easy Installation",
                            "Ecwid Ready",
                            "Elementor Page Builder"
                        ],
                        "coding" => [
                            "CSS 3",
                            "HTML 5",
                            "JQuery",
                            "Valid Coding",
                            "Sass"
                        ],
                        "additionalFeatures" => [
                            "Calendar",
                            "Favicon",
                            "Google map",
                            "Google Web Fonts",
                            "Sample content",
                            "Social Options",
                            "Commenting System",
                            "Live Search",
                            "Product Quick View",
                            "Crossbrowser Compatibility",
                            "Ajax Products Filter",
                            "MailChimp Ready Template",
                            "MegaMenu",
                            "Revolution Slider",
                            "Background Options",
                            "Media library",
                            "Performance Optimization",
                            "Sidebar Manager"
                        ],
                        "topic" => [
                            "Home Repairs Templates",
                            "Maintenance Services Templates",
                            "Business & Services",
                            "Home & Family",
                            "Business Services"
                        ],
                    ]
                ],
            ],
            "discounts" => [],
            "_links" => [
                "self" => [
                    "href" => "https://api.templatemonsterdev.com/carts/v1/carts/5ae30a5a1dddf2053d759a73"
                ]
            ]
        ];
    }
}