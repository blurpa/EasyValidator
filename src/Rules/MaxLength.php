<?php

namespace Blurpa\EasyValidator\Rules;

use Blurpa\EasyValidator\Rule;

class MaxLength extends Rule
{
    protected $message = 'The {label} field must be {option1} characters or less.';

    public function validate($item, $maxLength)
    {
        if (strlen($item) > $maxLength) {
            return false;
        } else {
            return true;
        }
    }
}