<?php

require __DIR__ . '/../vendor/autoload.php';

class testRouter extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Blurpa\EasyValidator\Validator();
     */
    protected $v;

    public function testTrueIsTrue()
    {
        $value = true;
        $this->assertTrue($value);
    }

    public function setUp()
    {
        $this->v = new \Blurpa\EasyValidator\Validator();
    }

    /**
     * @param $expected
     * @param $minNumber
     * @param $number
     *
     * @dataProvider minNumberData
     */
    public function testMinNumber($expected, $minNumber, $number)
    {
        $this->v->validate('test', $number)->applyRule('MinNumber', $minNumber);
        $test = $this->v->getRecentItemStatus();

        $this->assertEquals($expected, $test);
    }

    public function minNumberData()
    {
        return array(
            array(true, 5, 5),
            array(true, 5, 6),
            array(false, 5, 4)
        );
    }

    /**
     * @param $expected
     * @param $email
     *
     * @dataProvider emailData
     */
    public function testEmail($expected, $email)
    {
        $this->v->validate('test', $email)->applyRule('Email');

        $this->assertEquals($expected, $this->v->getRecentItemStatus());
    }

    public function emailData()
    {
        return array(
            array(true, 'test@test.com'),
            array(true, 'test@test.test.com'),
            array(true, 'test.test@test.test.com'),
            array(false, 'test@.com'),
            array(false, 'test@test@test.com')
        );
    }
}