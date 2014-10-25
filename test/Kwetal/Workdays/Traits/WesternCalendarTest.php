<?php

namespace Kwetal\Workdays\Traits;

use PHPUnit_Framework_TestCase;

class WesternCalenderTest extends PHPUnit_Framework_TestCase
{
    private $traitObject;

    public function setUp()
    {
        $this->traitObject = $this->getMockForTrait('Kwetal\Workdays\Traits\WesternCalendar');
    }

    public function testGetVariableHolidaysReturnsEmptyArray()
    {
        $value = $this->traitObject->getVariableHolidaysWestern(2014);

        $this->assertInternalType('array', $value);
        $this->assertCount(0, $value);
    }

    public function testGetFixedHolidaysWesternReturnsArrayWithFirstDayOfYear()
    {
        $value = $this->traitObject->getFixedHolidaysWestern(2014);

        $this->assertInternalType('array', $value);
        $this->assertCount(1, $value);
        $this->assertEquals('2014-01-01', $value[0]);
    }
}
