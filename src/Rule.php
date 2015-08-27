<?php

namespace Blurpa\EasyValidator;

abstract class Rule
{
    protected $message;

    public function getMessage()
    {
        return $this->message;
    }

}
