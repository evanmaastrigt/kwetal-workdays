<?php

namespace Kwetal\Workdays\Calendar;

use PHPUnit_Framework_TestCase;

class CalendarBaseTest extends PHPUnit_Framework_TestCase
{
    private $object;

    public function setUp()
    {
        $this->object = new CalendarBase();
    }

    public  function testGetWeekendDaysReturnsArrayWithTwoDays()
    {
        $value = $this->object->getWeekendDays();

        $this->assertInternalType('array', $value);
        $this->assertCount(2, $value);
        $this->assertEquals('Sat', $value[0]);
        $this->assertEquals('Sun', $value[1]);
    }
} 
