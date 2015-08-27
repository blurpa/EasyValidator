<?php

namespace Blurpa\EasyValidator\Rules;

use Blurpa\EasyValidator\Rule;
use Blurpa\EasyValidator\RuleInterface;

class MinLength extends Rule implements RuleInterface
{
    protected $message = 'The {label} field must be {option1} characters or more.';

    public function validate($item, $minLength)
    {
        return (!(strlen($item) < $minLength));
    }
}
