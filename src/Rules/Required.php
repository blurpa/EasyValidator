<?php

namespace NickStuer\EasyValidator\Rules;

use \NickStuer\EasyValidator\Rule;
use \NickStuer\EasyValidator\RuleInterface;

class Required extends Rule implements RuleInterface
{
    protected $message = 'The {label} field is required.';

    public function validate($item, $options)
    {
        return (!empty($item));
    }
}
