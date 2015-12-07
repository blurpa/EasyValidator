<?php

namespace NickStuer\EasyValidator\Rules;

use \NickStuer\EasyValidator\Rule;
use \NickStuer\EasyValidator\RuleInterface;

class MaxNumber extends Rule implements RuleInterface
{
    protected $message = 'The {label} field must be less than or equal to {option1}.';

    public function validate($item, $maxNumber)
    {
        return $item <= $maxNumber;
    }
}
