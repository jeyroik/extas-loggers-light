<?php
namespace extas\components\loggers;

use extas\interfaces\loggers\ICanLog;
use Monolog\Level;
use Psr\Log\LoggerInterface;

/**
 * @implements ICanLog
 */
trait TCanLog
{
    protected ?LoggerInterface $logger = null;
    protected EMode $mode = EMode::Debug;

    public function setLogger(LoggerInterface $logger): static
    {
        $this->logger = $logger;

        return $this;
    }

    public function isDebugModeOn(): bool
    {
        return $this->mode->isDebug();
    }

    public function log(string $message, array $context = [], Level $level = Level::Debug)
    {
        if ($this->isDebugModeOn()) {
            $this->logger->log($level, $message, $context);
        }
    }

    public function setMode(EMode $mode): static
    {
        $this->mode = $mode;

        return $this;
    }
}
