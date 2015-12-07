<?php

namespace NickStuer\EasyValidator\Rules;

use \NickStuer\EasyValidator\Rule;
use \NickStuer\EasyValidator\RuleInterface;

class MinNumber extends Rule implements RuleInterface
{
    protected $message = 'The {label} field must be greater than or equal to {option1}.';

    public function validate($item, $minNumber)
    {
        return $item >= $minNumber;
    }
}
