<?php

namespace Blurpa\EasyValidator;

interface RuleInterface
{
    public function validate($item, $options);

    public function setMessage($message);

    public function getMessage();

}
