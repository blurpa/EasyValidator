<?php

namespace NickStuer\EasyValidator\Rules;

use \NickStuer\EasyValidator\Rule;
use \NickStuer\EasyValidator\RuleInterface;

class IP extends Rule implements RuleInterface
{
    protected $message = 'The ip address is an invalid format.';

    public function validate($item, $options)
    {
        return filter_var($item, FILTER_VALIDATE_IP);
    }
}
