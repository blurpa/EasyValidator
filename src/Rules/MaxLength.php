<?php

namespace Blurpa\EasyValidator\Rules;

use Blurpa\EasyValidator\Rule;
use Blurpa\EasyValidator\RuleInterface;

class MaxLength extends Rule implements RuleInterface
{
    protected $message = 'The {label} field must be {option1} characters or less.';

    public function validate($item, $maxLength)
    {
        return (!(strlen($item) > $maxLength));
    }
}
