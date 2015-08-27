<?php

namespace Blurpa\EasyValidator\Rules;

use Blurpa\EasyValidator\Rule;
use Blurpa\EasyValidator\RuleInterface;

class Required extends Rule implements RuleInterface
{
    protected $message = 'The {label} field is required.';

    public function validate($item, $options)
    {
        return (!empty($item));
    }
}
