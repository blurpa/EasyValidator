<?php

namespace NickStuer\EasyValidator;

abstract class Rule
{
    protected $message;

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

}
