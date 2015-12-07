<?php

namespace NickStuer\EasyValidator\Rules;

use \NickStuer\EasyValidator\Rule;
use \NickStuer\EasyValidator\RuleInterface;

class Date extends Rule implements RuleInterface
{
    protected $message = 'The {label} field must be in mm/dd/yyyy format and a valid date.';

    public function validate($item, $options)
    {

        $date = explode('/', $item);

        if (count($date) != 3){
            return false;
        }

        if (strlen($date[0]) !== 2) {
            return false;
        }

        if (strlen($date[1]) !== 2) {
            return false;
        }

        if (strlen($date[2]) !== 4) {
            return false;
        }

        return checkdate($date[0], $date[1], $date[2]);
    }
}
