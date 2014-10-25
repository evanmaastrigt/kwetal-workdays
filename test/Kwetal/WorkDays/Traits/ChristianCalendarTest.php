<?php

namespace Kwetal\WorkDays\Traits;

use PHPUnit_Framework_TestCase;

class ChristianCalendarTest extends PHPUnit_Framework_TestCase
{
    private $traitObject;

    public function setUp()
    {
        $this->traitObject = $this->getMockForTrait('Kwetal\WorkDays\Traits\ChristianCalendar');
    }

    public function testClassStructure()
    {
        $this->assertObjectHasAttribute('hasEpiphany', $this->traitObject);
        $this->assertObjectHasAttribute('hasEasterSunday', $this->traitObject);
        $this->assertObjectHasAttribute('hasEasterMonday', $this->traitObject);
    }

    public function testGetFixedHolidaysChristianReturnsEmptyArray()
    {
        $value = $this->traitObject->getFixedHolidaysChristian(2014);

        $this->assertInternalType('array', $value);
        $this->assertCount(0, $value);
    }

    public function testGetFixedHolidaysChristianReturnsEpiphanyDay()
    {
        $this->traitObject->hasEpiphany = true;
        $value = $this->traitObject->getFixedHolidaysChristian(2014);

        $this->assertInternalType('array', $value);
        $this->assertCount(1, $value);
        $this->assertEquals('2014-01-06', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsEmptyArray()
    {
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->assertInternalType('array', $value);
        $this->assertCount(0, $value);
    }

    public function testGetVariableHolidaysChristianReturnsEasterSunday()
    {
        $this->traitObject->hasEasterSunday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->assertInternalType('array', $value);
        $this->assertCount(1, $value);
        $this->assertEquals('2014-04-20', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsEasterMonday()
    {
        $this->traitObject->hasEasterMonday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->assertInternalType('array', $value);
        $this->assertCount(1, $value);
        $this->assertEquals('2014-04-21', $value[0]);
    }
} 
