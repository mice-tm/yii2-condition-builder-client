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
        $data = $constructor->filter();

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
//                    "operator" => "AND",
//                    "conditions" => [
////                        [
////                            "operator" => "NOT",
////                            "conditions" => [
////                                [
////                                    "attribute" => "items.price_variant",
////                                    "comparison" => "in",
////                                    "value" => [
////                                        "exclusive",
////                                        "buyout"
////                                    ],
////                                    "conditions" => []
////                                ]
////                            ]
////                        ],
//                        [
//                            "attribute" => "items.namespace",
//                            "comparison" => "=",
//                            "value" => "products",
//                            "conditions" => []
//                        ],
////                        [
////                            "attribute" => "project",
////                            "comparison" => "=",
////                            "value" => "TM",
////                            "conditions" => []
////                        ]
//                    ]
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
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v2/products/en/68293",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55551,
//                    "price" => 139,
//                    "final_price" => 139,
//                    "updated_at" => 1524828869,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => [],
//                    'properties' => [
//                        "color" => [
//                            "black",
//                            "white",
//                            "grey"
//                        ],
//                        "features" => [
//                            "Easy Installation",
//                            "Admin Panel",
//                            "Cherry Framework 5",
//                            "Responsive",
//                            "Retina Ready",
//                            "Sample Data Installer",
//                            "Search Engine Friendly",
//                            "Visual Editor",
//                            "WPML ready",
//                            "Ecwid Ready"
//                        ],
//                        "coding" => [
//                            "CSS 3",
//                            "HTML 5",
//                            "JQuery",
//                            "Valid Coding",
//                            "Sass"
//                        ],
//                        "additionalFeatures" => [
//                            "MegaMenu",
//                            "Calendar",
//                            "Commenting System",
//                            "Crossbrowser Compatibility",
//                            "Dropdown Menu",
//                            "Favicon",
//                            "Google map",
//                            "Google Web Fonts",
//                            "Sample content",
//                            "Social Options",
//                            "MailChimp Ready Template",
//                            "Background Options",
//                            "Media library",
//                            "Live Customizer",
//                            "Performance Optimization",
//                            "Sidebar Manager"
//                        ],
//                        "topic" => [
//                            "Architecture",
//                            "Construction Company Templates",
//                            "Design",
//                            "Design & Photography"
//                        ],
//                    ]
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55539",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55539,
//                    "price" => 199,
//                    "final_price" => 199,
//                    "updated_at" => 1524828873,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55554",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55554,
//                    "price" => 139,
//                    "final_price" => 139,
//                    "updated_at" => 1524828877,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55527",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55527,
//                    "price" => 139,
//                    "final_price" => 139,
//                    "updated_at" => 1524828881,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55519",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55519,
//                    "price" => 139,
//                    "final_price" => 139,
//                    "updated_at" => 1524828885,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55521",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55521,
//                    "price" => 139,
//                    "final_price" => 139,
//                    "updated_at" => 1524828889,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55531",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55531,
//                    "price" => 199,
//                    "final_price" => 199,
//                    "updated_at" => 1524828893,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55511",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55511,
//                    "price" => 199,
//                    "final_price" => 199,
//                    "updated_at" => 1524828897,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55504",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55504,
//                    "price" => 199,
//                    "final_price" => 199,
//                    "updated_at" => 1524828901,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55542",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55542,
//                    "price" => 14,
//                    "final_price" => 14,
//                    "updated_at" => 1524828905,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55543",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55543,
//                    "price" => 114,
//                    "final_price" => 114,
//                    "updated_at" => 1524828909,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55524",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55524,
//                    "price" => 139,
//                    "final_price" => 139,
//                    "updated_at" => 1524828913,
//                    "created_at" => 1524828765,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55518",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55518,
//                    "price" => 139,
//                    "final_price" => 139,
//                    "updated_at" => 1524828841,
//                    "created_at" => 1524828764,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55502",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55502,
//                    "price" => 199,
//                    "final_price" => 199,
//                    "updated_at" => 1524828845,
//                    "created_at" => 1524828764,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55503",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55503,
//                    "price" => 199,
//                    "final_price" => 199,
//                    "updated_at" => 1524828849,
//                    "created_at" => 1524828764,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55516",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55516,
//                    "price" => 139,
//                    "final_price" => 139,
//                    "updated_at" => 1524828853,
//                    "created_at" => 1524828764,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55538",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55538,
//                    "price" => 199,
//                    "final_price" => 199,
//                    "updated_at" => 1524828857,
//                    "created_at" => 1524828764,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55533",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55533,
//                    "price" => 199,
//                    "final_price" => 199,
//                    "updated_at" => 1524828861,
//                    "created_at" => 1524828764,
//                    "namespace" => "products",
//                    "discounts" => []
//                ],
//                [
//                    "price_variant" => "regular",
//                    "link" => "http://service-products.dev/api/v1/products/en/55555",
//                    "services" => [],
//                    "bundles" => [],
//                    "id" => 55547,
//                    "price" => 75,
//                    "final_price" => 75,
//                    "updated_at" => 1524828865,
//                    "created_at" => 1524828764,
//                    "namespace" => "products",
//                    "discounts" => [],
//                    "properties" => [
//                        "bestsellersindex" => "1",
//                        "reviewAverageScoreEs" => "5",
//                        "features" => "CV",
//                        "templateSources" => [
//                            ".PSD",
//                            ".PHP",
//                        ],
//                        "nameOfTheTemplate" => "Monstroid",
//                        "reviewAverageScoreDe" => "5",
//                        "topic" => [
//                            "Architecture",
//                            "Construction Company Templates",
//                            "SEO Website Templates",
//                            "Furniture Templates",
//                            "Lawyer Templates",
//                            "Education Templates",
//                            "Hotels Templates",
//                            "Interior & Furniture Templates",
//                            "Law Templates",
//                            "Sport Templates",
//                            "Design",
//                            "Design & Photography",
//                            "Education & Books",
//                            "Business & Services",
//                            "Home & Family",
//                            "Fashion & Beauty",
//                            "Society & People",
//                            "Sports, Outdoors & Travel",
//                            "Loans",
//                            "Finance",
//                            "Business Services",
//                            "More Sports"
//                        ],
//                        "styles" => "Neutral",
//                        "turnOnPreviewExperiment" => "1",
//                        "productFamily" => "Monstroid",
//                        "followUpLetter" => "wp-themes-offers",
//                        "color" => [
//                            "white",
//                            "grey",
//                            "brown",
//                            "pink",
//                            "blue"
//                        ],
//                        "reviewsTotal" => "228",
//                        "bestsellers" => "40",
//                        "wordpressCompatibility" => "4.2.x-4.9.x",
//                        "reviewAverageScore" => "5",
//                        "sqi" => "95",
//                        "functionality" => [
//                            "Blog",
//                            "Portfolio",
//                            "One Page Templates"
//                        ],
//                        "additionalFeatures" => [
//                            "Advanced Theme Options",
//                            "Sliced PSD",
//                            "Calendar",
//                            "Crossbrowser Compatibility",
//                            "Custom Page Templates",
//                            "Dropdown Menu",
//                            "Favicon",
//                            "Google map",
//                            "Google Web Fonts",
//                            "Social Options",
//                            "Tabs",
//                            "Tag Cloud",
//                            "Tooltips",
//                            "MegaMenu"
//                        ],
//                        "types" => "WordPress Themes",
//                        "trendiness" => "12",
//                        "customDeliveryLetter" => "delivery_link_monstroid",
//                        "reviewsTotalEs" => "6",
//                        "testOnlyProperty" => "test",
//                        "webForms" => "Contact Form",
//                        "cherryFrameworkVersion" => "4.0",
//                        "loyaltySells" => "1",
//                        "skupromo" => "9%",
//                        "dqi" => "89"
//                    ],
//                    "categoryId" => 100
//                ]
            ],
            "discounts" => [],
        ];
    }
}