<?php

namespace Blurpa\EasyValidator\Rules;

use Blurpa\EasyValidator\Rule;
use Blurpa\EasyValidator\RuleInterface;

class MaxNumber extends Rule implements RuleInterface
{
    protected $message = 'The {label} field must be less than or equal to {option1}.';

    public function validate($item, $maxNumber)
    {
        return $item <= $maxNumber;
    }
}
