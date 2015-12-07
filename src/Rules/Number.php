<?php

namespace NickStuer\EasyValidator\Rules;

use \NickStuer\EasyValidator\Rule;
use \NickStuer\EasyValidator\RuleInterface;

class Number extends Rule implements RuleInterface
{
    protected $message = 'The {label} field must be a number.';

    public function validate($item, $options)
    {
        return is_numeric($item);
    }
}
