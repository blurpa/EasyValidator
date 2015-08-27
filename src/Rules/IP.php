<?php

namespace Blurpa\EasyValidator\Rules;

use Blurpa\EasyValidator\Rule;
use Blurpa\EasyValidator\RuleInterface;

class IP extends Rule implements RuleInterface
{
    protected $message = 'The ip address is an invalid format.';

    public function validate($item, $options)
    {
        return filter_var($item, FILTER_VALIDATE_IP);
    }
}
