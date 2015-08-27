<?php

namespace Blurpa\EasyValidator\Rules;

use Blurpa\EasyValidator\Rule;

class IP extends Rule
{
    protected $message = 'The ip address is an invalid format.';

    public function validate($item, $options)
    {
        if (!filter_var($item, FILTER_VALIDATE_IP)) {
            return false;
        } else
        {
            return true;
        }
    }
}