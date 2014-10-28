<?php

namespace Kwetal\Workdays\Traits;

use PHPUnit_Framework_TestCase;

class ChristianCalendarTest extends PHPUnit_Framework_TestCase
{
    private $traitObject;

    public function setUp()
    {
        $this->traitObject = $this->getMockForTrait('Kwetal\Workdays\Traits\ChristianCalendar');
    }

    public function hasReturnedValueCorrectStructure($value)
    {
        $this->assertInternalType('array', $value);
        $this->assertCount(1, $value);
    }

    public function testClassStructure()
    {
        $this->assertObjectHasAttribute('hasEpiphany', $this->traitObject);
        $this->assertObjectHasAttribute('hasAnnunciation', $this->traitObject);
        $this->assertObjectHasAttribute('hasAllSaints', $this->traitObject);
        $this->assertObjectHasAttribute('hasImmaculateConception', $this->traitObject);
        $this->assertObjectHasAttribute('hasChristmasEve', $this->traitObject);
        $this->assertObjectHasAttribute('hasChristmasSunday', $this->traitObject);
        $this->assertObjectHasAttribute('hasChristmasMonday', $this->traitObject);
        $this->assertObjectHasAttribute('hasCleanMonday', $this->traitObject);
        $this->assertObjectHasAttribute('hasAshWednesday', $this->traitObject);
        $this->assertObjectHasAttribute('hasHolyThursday', $this->traitObject);
        $this->assertObjectHasAttribute('hasGoodFriday', $this->traitObject);
        $this->assertObjectHasAttribute('hasEasterSaturday', $this->traitObject);
        $this->assertObjectHasAttribute('hasEasterSunday', $this->traitObject);
        $this->assertObjectHasAttribute('hasEasterMonday', $this->traitObject);
        $this->assertObjectHasAttribute('hasWhitSunday', $this->traitObject);
        $this->assertObjectHasAttribute('hasWhitMonday', $this->traitObject);
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

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-01-06', $value[0]);
    }

    public function testGetFixedHolidaysChristianReturnsAnnunciationDay()
    {
        $this->traitObject->hasAnnunciation = true;
        $value = $this->traitObject->getFixedHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-03-25', $value[0]);
    }

    public function testGetFixedHolidaysChristianReturnsAssumptionDay()
    {
        $this->traitObject->hasAssumption = true;
        $value = $this->traitObject->getFixedHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-08-15', $value[0]);
    }

    public function testGetFixedHolidaysChristianReturnsAllSaintsDay()
    {
        $this->traitObject->hasAllSaints = true;
        $value = $this->traitObject->getFixedHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-11-01', $value[0]);
    }

    public function testGetFixedHolidaysChristianReturnsAllSoulsDay()
    {
        $this->traitObject->hasAllSouls = true;
        $value = $this->traitObject->getFixedHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-11-02', $value[0]);
    }

    public function testGetFixedHolidaysChristianReturnsImmaculateConception()
    {
        $this->traitObject->hasImmaculateConception = true;
        $value = $this->traitObject->getFixedHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-12-08', $value[0]);
    }

    public function testGetFixedHolidaysChristianReturnsChristmasEve()
    {
        $this->traitObject->hasChristmasEve = true;
        $value = $this->traitObject->getFixedHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-12-24', $value[0]);
    }

    public function testGetFixedHolidaysChristianReturnsChristmasSunday()
    {
        $this->traitObject->hasChristmasSunday = true;
        $value = $this->traitObject->getFixedHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-12-25', $value[0]);
    }

    public function testGetFixedHolidaysChristianReturnsChristmasMonday()
    {
        $this->traitObject->hasChristmasMonday = true;
        $value = $this->traitObject->getFixedHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-12-26', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsEmptyArray()
    {
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->assertInternalType('array', $value);
        $this->assertCount(0, $value);
    }

    public function testGetVariableHolidaysChristianReturnsCleanMonday()
    {
        $this->traitObject->hasCleanMonday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-03-03', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsAshWednesday()
    {
        $this->traitObject->hasAshWednesday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-03-05', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsHolyThursday()
    {
        $this->traitObject->hasHolyThursday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-04-17', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsGoodFriday()
    {
        $this->traitObject->hasGoodFriday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-04-18', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsEasterSaturday()
    {
        $this->traitObject->hasEasterSaturday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-04-19', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsEasterSunday()
    {
        $this->traitObject->hasEasterSunday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-04-20', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsEasterMonday()
    {
        $this->traitObject->hasEasterMonday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-04-21', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsAscensionThursday()
    {
        $this->traitObject->hasAscensionThursday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-05-29', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsWhitSunday()
    {
        $this->traitObject->hasWhitSunday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-06-08', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsWhitMonday()
    {
        $this->traitObject->hasWhitMonday = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-06-09', $value[0]);
    }

    public function testGetVariableHolidaysChristianReturnsCorpusChristi()
    {
        $this->traitObject->hasCorpusChristi = true;
        $value = $this->traitObject->getVariableHolidaysChristian(2014);

        $this->hasReturnedValueCorrectStructure($value);
        $this->assertEquals('2014-06-19', $value[0]);
    }
} 
