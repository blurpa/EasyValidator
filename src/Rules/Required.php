<?php

namespace Blurpa\EasyValidator\Rules;

use Blurpa\EasyValidator\Rule;

class Required extends Rule
{
    protected $message = 'The {label} field is required.';

    public function validate($item, $options)
    {
        return (!empty($item));
    }
}