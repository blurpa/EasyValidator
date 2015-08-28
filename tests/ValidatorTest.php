<?php

require __DIR__ . '/../vendor/autoload.php';

class testRouter extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Blurpa\EasyValidator\Validator();
     */
    protected $v;

    protected function setUp()
    {
        $this->v = new \Blurpa\EasyValidator\Validator();
    }


    public function testMultipleRules()
    {
        $this->v->validate('testMultipleRules', 'testValue')
            ->applyRule('Required')
            ->applyRule('Number', 5)
            ->applyRule('Number');

        $this->assertEquals(3, $this->v->getItemRuleCount('testMultipleRules'));
    }

    public function testStopOnFail()
    {
        $this->v->validate('testStop', 'testValue')
            ->applyRule('Required')
            ->applyStop('Number')
            ->applyRule('MinNumber', 5)
            ->applyRule('MinNumber', 2);

        $this->assertEquals(2, $this->v->getItemRuleCount('testStop'));
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
        $testLabel = 'testMinNumber';
        $this->v->validate($testLabel, $number)->applyRule('MinNumber', $minNumber);

        $test = $this->v->getItemStatus($testLabel);
        $test2 = $this->v->getValidationStatus();

        $this->assertEquals($expected, $test);
        $this->assertEquals($expected, $test2);
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
        $this->v->validate('testEmail', $email)->applyRule('Email');

        $this->assertEquals($expected, $this->v->getValidationStatus());
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




    /**
     * @param $expected
     * @param $date
     *
     * @dataProvider dateData
     */
    public function testDate($expected, $date)
    {
        $testLabel = 'testDate';
        $this->v->validate($testLabel, $date)->applyRule('Date');

        $test = $this->v->getItemStatus($testLabel);
        $test2 = $this->v->getValidationStatus();

        $this->assertEquals($expected, $test);
        $this->assertEquals($expected, $test2);
    }

    public function dateData()
    {
        return array(
            array(true, '01/01/1985'),
            array(true, '12/31/2154'),
            array(false, '13/31/2015'),
            array(false, '2/30/2014'),
            array(true, '02/29/2012'),
            array(false, '1/02/1985'),
            array(false, '01/2/1986'),
            array(false, '01/01'),
            array(false, '01/01/88'),
            array(false, '01/01/2014/2014')
        );
    }
}