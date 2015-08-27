<?php

namespace Blurpa\EasyValidator\Rules;

use Blurpa\EasyValidator\Rule;

class MinLength extends Rule
{
    protected $message = 'The {label} field must be {option1} characters or more.';

    public function validate($item, $minLength)
    {
        return (strlen($item) < $minLength);
    }
}
