# yii2-condition-builder-client

<!-- BADGES/ -->
[![version][version-badge]][CHANGELOG]
[![Latest Version][latest-version-badge]][LATEST-VERSION]
[![License: MIT][license-mit-badge]][LICENSE-MIT]
[![Total Downloads][total-downloads-badge]][TOTAL-DOWNLOADS]
<!-- /BADGES -->

It's a specific library which, based on constructor conditions and data to compare, performs data filtering according to given conditions

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist studxxx/yii2-condition-builder-client "*"
```

or add

```
"studxxx/yii2-condition-builder-client": "*"
```

to the require section of your `composer.json` file.

## Setup
Into config file
```php
<?php
return [
    // ...
    'container' => [
        'definitions' => [
            'studxxx\conditionclient\ConditionBuilderInterface' =>
                'studxxx\conditionclient\ConditionBuilder',
        ]
    ]
];
```

## Condiction format

```php
<php
return [
    "conditions" => [
        [
            "operator" => "AND",
            "conditions" => [
                [
                    "operator" => "NOT",
                    "conditions" => [
                        [
                            "attribute" => "items.price_variant",
                            "comparison" => "in",
                            "value" => [
                                "exclusive",
                                "buyout"
                            ],
                        ]
                    ]
                ],
                [
                    "attribute" => "items.namespace",
                    "comparison" => "=",
                    "value" => "products",
                ],
                [
                    "attribute" => "project",
                    "comparison" => "=",
                    "value" => "TM",
                }
            ]
        ]
    ],
];
```

```php
<?php

namespace api\modules\api\v2\services;

use studxxx\conditionclient\ConditionBuilderInterface;

class DiscountService implements DiscountServiceInterface
{
    /** @var ConditionBuilderInterface */
    private $conditionBuilder;

    public function __construct(ConditionBuilderInterface $conditionBuilder)
    {
        $this->conditionBuilder = $conditionBuilder;
    }

    public function applicability(ConditionQuery $query, string $code, array $params = []): array
    {
        /** @var array $condition */
        $condition = $this->getCondition($query, $code);

        $this->conditionBuilder->setData($params);
        return $this->conditionBuilder->buildConditions($condition)->getData();
    }
}
```


[CHANGELOG]: ./CHANGELOG.md
[version-badge]: https://img.shields.io/badge/version-1.0.0-blue.svg

[TOTAL-DOWNLOADS]: https://packagist.org/packages/studxxx/yii2-condition-builder-client
[total-downloads-badge]: https://img.shields.io/packagist/dt/studxxx/yii2-condition-builder-client.svg?style=flat-square

[LATEST-VERSION]: https://github.com/studxxx/yii2-condition-builder-client/releases
[latest-version-badge]: https://img.shields.io/github/tag/studxxx/yii2-condition-builder-client.svg?style=flat-square&label=release

[LICENSE-MIT]: https://opensource.org/licenses/MIT
[license-mit-badge]: https://img.shields.io/badge/License-MIT-yellow.svg
