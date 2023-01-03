Yii2 Dev Configuration
====================
Yii2 Dev Configuration for Yii2

Installation
------------

This is just an example, memorible moment. The source code may not work for known reasons. This source code include against loss license feature.

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist thienhungho/yii2-dev-configuration "*"
```

or add

```
"thienhungho/yii2-dev-configuration": "*"
```

to the require section of your `composer.json` file.

Config
------------

Add module ScriptConfiguration to your `AppConfig` file.

```php
...
'modules'          => [
    ...
    /**
     * Dev Configuration
     */
     'dev-configuration' => [
        'class' => 'thienhungho\DevConfiguration\modules\DevConfiguration\DevConfiguration',
     ],
    ...
],
...
```

### Migration

Modules
------------

[Devonfigurations](https://github.com/thienhungho/yii2-dev-configuration/tree/master/src/modules/DevConfiguration)

Functions
------------

[Core](https://github.com/thienhungho/yii2-dev-configuration/tree/master/src/functions/core.php)

Constant
------------

[Core](https://github.com/thienhungho/yii2-dev-configuration/tree/master/src/const/core.php)

Models
------------

[DevConfiguration](https://github.com/thienhungho/yii2-dev-configuration/tree/master/src/models/DevConfigudration.php)
