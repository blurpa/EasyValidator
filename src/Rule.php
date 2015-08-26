<?php

namespace Blurpa\EasyAuthentication;

abstract class Rule
{
    protected $message;

    public function getMessage()
    {
        return $this->message;
    }

}