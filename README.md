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

<!--
config tests
cd yii2-prj/yii2-condition-builder-client/
codecept bootstrap
codecept config unit
codecept g:group Delimiters
codecept g:test unit "Delimiters\ANDDelimiter"
codecept build
codecept run
codecept run --coverage --coverage-html

php -m | grep xdebug
php -m | grep pear
sudo apt install php-pear
pear config-set preferred_state alpha
sudo pecl install xdebug

php -m | grep xdebug
sudo service php7.2-fpm restart
cd /etc/php/7.2/mods-available/
ls | grep xdebug
apt search php7.2 | grep dev
sudo apt install php7.2-dev
pear config-set preferred_state alpha
sudo pecl install xdebug

sudo touch xdebug.ini
sudo ln -sf /etc/php/7.2/mods-available/xdebug.ini /etc/php/7.2/fpm/conf.d/20-xdebug.ini
sudo ln -sf /etc/php/7.2/mods-available/xdebug.ini /etc/php/7.2/cli/conf.d/20-xdebug.ini
php -m | grep xdebug
sudo vi /etc/php/7.2/mods-available/xdebug.ini

```
zend_extension=/usr/lib/php/20151012/xdebug.so   
xdebug.idekey="phpstorm"                         
xdebug.remote_enable=1                           
xdebug.remote_connect_back=1                     
xdebug.remote_port=9000                          
xdebug.max_nesting_level=300                     
xdebug.scream=0                                  
xdebug.cli_color=1                               
xdebug.show_local_vars=1
```

codecept run --coverage --coverage-html
`https://medium.com/unhandled-code/manual-xdebug-install-on-homestead-7-0-running-php-7-2-37716928bfb3`
-->