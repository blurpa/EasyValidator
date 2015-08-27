<?php

namespace Blurpa\EasyValidator\Rules;

use Blurpa\EasyValidator\Rule;
use Blurpa\EasyValidator\RuleInterface;

class Number extends Rule implements RuleInterface
{
    protected $message = 'The {label} field must be a number.';

    public function validate($item, $options)
    {
        return is_numeric($item);
    }
}
