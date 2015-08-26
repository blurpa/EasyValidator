<?php

namespace Blurpa\EasyAuthentication\Rules;

use Blurpa\EasyAuthentication\Rule;

class Number extends Rule
{
    protected $message = 'The {label} field must be a number.';

    public function validate($item)
    {
        return is_numeric($item);
    }
}