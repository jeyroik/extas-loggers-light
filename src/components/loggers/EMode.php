<?php
namespace extas\components\loggers;

enum EMode: string
{
    case Debug = 'debug';
    case Production = 'prod';

    public function isDebug(): bool
    {
        return match($this) {
            EMode::Debug => true,
            EMode::Production => false
        };
    }
}
