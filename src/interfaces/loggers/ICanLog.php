<?php
namespace extas\interfaces\loggers;

use extas\components\loggers\EMode;
use Monolog\Level;
use Psr\Log\LoggerInterface;

interface ICanLog
{
    public function isDebugModeOn(): bool;
    public function setLogger(LoggerInterface $logger): static;
    public function setMode(EMode $mode): static;
    public function log(string $message, array $context = [], Level $level = Level::Debug);
}
