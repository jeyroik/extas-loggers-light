![PHP Composer](https://github.com/jeyroik/extas-loggers-light/workflows/PHP%20Composer/badge.svg?branch=master)
![codecov.io](https://codecov.io/gh/jeyroik/extas-loggers-light/coverage.svg?branch=master)

[![Latest Stable Version](https://poser.pugx.org/jeyroik/extas-loggers-light/v)](//packagist.org/packages/jeyroik/extas-loggers-light)
[![Total Downloads](https://poser.pugx.org/jeyroik/extas-loggers-light/downloads)](//packagist.org/packages/jeyroik/extas-loggers-light)
[![Dependents](https://poser.pugx.org/jeyroik/extas-loggers-light/dependents)](//packagist.org/packages/jeyroik/extas-loggers-light)


# extas-loggers-light

Light logger package

# usage

```php

use extas\interfaces\loggers\ICanLog;
use extas\components\loggers\TCanLog;
use extas\components\loggers\EMode;

use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

class My implements ICanLog
{
    use TCanLog;

    public function __construct()
    {
        $logger = new Logger('test');
        $logger->pushHandler(new StreamHandler('/some/path', Level::Debug));
        $this->setLogger($logger);
    }
}

$my = new My();
$my->setMode(EMode::DEBUG);
$my->log('message', ['some' => 'context'], Level::Debug);
// or just $my->log('message');
```