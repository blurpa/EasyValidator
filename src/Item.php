<?php

namespace Blurpa\EasyValidator;

class Item
{
    /**
     * @var string
     */
    private $label;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var bool
     */
    private $validationStatus;

    /**
     * @var array
     */
    private $messages = array();

    /**
     * @var int
     */
    private $ruleCount = 0;

    /**
     * @var bool
     */
    private $stopRules = false;

    /**
     * Constructor
     *
     * @param string $itemLabel
     * @param mixed $itemValue
     */
    public function __construct($itemLabel, $itemValue)
    {
        $this->setItemLabel($itemLabel);
        $this->setItemValue($itemValue);

        $this->setValidationStatus(true);
    }

    /**
     * @param bool $status
     */
    public function setValidationStatus($status)
    {
        $this->validationStatus = $status;
    }

    /**
     * @return bool
     */
    public function getValidationStatus()
    {
        return $this->validationStatus;
    }

    /**
     * @param mixed $value
     */
    public function setItemValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getItemValue()
    {
        return $this->value;
    }

    /**
     * @param string $label
     */
    public function setItemLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getItemLabel()
    {
        return $this->label;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->messages[] = $message;
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @return bool
     */
    public function stopRules()
    {
        return $this->stopRules;
    }

    /**
     * @param bool $stopRules
     */
    public function setStopRules($stopRules)
    {
        $this->stopRules = $stopRules;
    }

    /**
     * Increase rules applied by 1.
     */
    public function incrementRuleCount()
    {
        $this->ruleCount++;
    }
}
