<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\DateUtils\DateTime\DateTime;
use PHPUnit_Framework_TestCase;

class RhinelandPalatinateTest extends PHPUnit_Framework_TestCase
{
    public $calendar;

    public function createCalendar($year)
    {
        $this->calendar = new RhinelandPalatinate($year);
    }

    public function testGetAllHolidaysReturnsArray()
    {
        $this->createCalendar(2014);
        $value = $this->calendar->getHolidays();

        $this->assertInternalType('array', $value);
    }

    public function testGetHolidaysReturnsCorrectCount()
    {
        $this->createCalendar(2014);
        $value = $this->calendar->getHolidays();

        $this->assertCount(13, $value);
    }

    public function testGetHolidaysHasAllHolidays()
    {
        $this->createCalendar(2014);
        $value = $this->calendar->getHolidays();

        $this->assertTrue(in_array(new DateTime('2014-11-01'), $value));
        $this->assertTrue(in_array(new DateTime('2014-06-19'), $value));
    }

    public function testAddWorkDays()
    {
        $this->createCalendar(2014);

        $day = new DateTime('2014-06-18');
        $this->calendar->addWorkdays($day, 1);

        $this->assertEquals('2014-06-20', $day->format('Y-m-d'));

        $day = new DateTime('2014-10-03');
        $this->calendar->addWorkdays($day, 20);

        $this->assertEquals('2014-10-31', $day->format('Y-m-d'));
    }
} 
