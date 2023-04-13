<?php

use extas\components\loggers\EMode;
use extas\components\loggers\TCanLog;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class CanLogTest extends TestCase
{
    public const LOG__PATH = '/tmp/test.log';

    public function testLog()
    {
        $some = new class {

            use TCanLog;

            public function __construct()
            {
                $logger = new Logger('test');
                $logger->pushHandler(new StreamHandler(CanLogTest::LOG__PATH, Level::Debug));
                $this->setLogger($logger);
            }
        };

        $mode = 'debug';

        $some->setMode(EMode::from($mode));

        $this->assertTrue($some->isDebugModeOn());

        $message = 'from test debug ' . time();
        $some->log($message);

        $this->assertStringContainsString($message, file_get_contents(static::LOG__PATH));

        $mode = 'prod';

        $some->setMode(EMode::from($mode));
        $this->assertFalse($some->isDebugModeOn());

        $message = 'from test prod ' . time();
        $some->log($message);

        $this->assertStringNotContainsString($message, file_get_contents(static::LOG__PATH));

        unlink(static::LOG__PATH);
    }
}
