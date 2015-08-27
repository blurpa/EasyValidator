<?php

namespace Blurpa\EasyValidator;

use Blurpa\EasyValidator\RuleNotFoundException;
use Blurpa\EasyValidator\Item;

class Validator
{
    /**
     * @var bool
     */
    private $validationStatus;

    /**
     * @var Item[]
     */
    private $items = array();

    /**
     * @var string
     */
    private $currentKey;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Initializes the validation parameters of the given $itemLabel
     *
     * @param string $itemLabel
     * @param string $itemValue
     *
     * @return $this
     */
    public function validate($itemLabel, $itemValue)
    {
        $this->currentKey = $itemLabel;
        $item = new Item($itemLabel, $itemValue);
        $this->items[$itemLabel] = $item;

        return $this;
    }

    /**
     * @param string $ruleName
     * @param string $options
     *
     * @return $this
     */
    public function applyRule($ruleName, $options = '')
    {
        $item = $this->items[$this->currentKey];
        $this->processRule($item, $ruleName, $options);

        return $this;
    }

    /**
     * @param string $ruleName
     * @param string $options
     *
     * @return $this
     */
    public function applyStop($ruleName, $options = '')
    {
        $item = $this->items[$this->currentKey];
        $this->processRule($item, $ruleName, $options);

        if ($item->getValidationStatus() === false) {
            $item->setStopRules(true);
        }

        return $this;
    }

    /**
     * @param Item $item
     * @param string $ruleName
     * @param string $options
     *
     * @throws RuleNotFoundException when no rule is found.
     */
    private function processRule(Item $item, $ruleName, $options)
    {
        if ($item->stopRules()) {
            return;
        }

        $ruleName = '\Blurpa\EasyValidator\Rules\\' . $ruleName;

        if (!class_exists($ruleName)) {
            throw new RuleNotFoundException;
        }

        /**
         * @var \Blurpa\EasyValidator\RuleInterface $rule
         */
        $rule = new $ruleName;
        if (!$rule->validate($item->getItemValue(), $options)) {
            $this->setValidationStatus(false);
            $item->setValidationStatus(false);

            $message = $rule->getMessage();
            $message = str_replace('{label}', $item->getItemLabel(), $message);
            $message = str_replace('{option1}', $options, $message);
            $item->setMessage($message);
        }

        $item->incrementRuleCount();
    }

    /**
     * @param string $itemLabel
     *
     * @return bool
     */
    public function getItemStatus($itemLabel)
    {
        return $this->items[$itemLabel]->getValidationStatus();
    }

    /**
     * @param string $itemLabel
     *
     * @return array
     */
    public function getItemMessages($itemLabel)
    {
        return $this->items[$itemLabel]->getMessages();
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        $messages = array();
        foreach ($this->items as $item) {
            foreach ($item->getMessages() as $message) {
                $messages[] = $message;
            }
        }

        return $messages;
    }
}
