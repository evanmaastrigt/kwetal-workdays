<?php

namespace Kwetal\Workdays\Calendar\World\Europe\France;

use Kwetal\DateUtils\DateTime\DateTime;
use PHPUnit_Framework_TestCase;

class AlsaceMosseleTest extends PHPUnit_Framework_TestCase
{
    public $calendar;

    public function createCalendar($year)
    {
        $this->calendar = new AlsaceMoselle($year);
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

        $this->assertTrue(in_array(new DateTime('2014-04-18'), $value));
        $this->assertTrue(in_array(new DateTime('2014-12-26'), $value));
    }

    public function testAddWorkDays()
    {
        $this->createCalendar(2014);

        $day = new \DateTime('2014-04-16');
        $this->calendar->addWorkdays($day, 1);

        $this->assertEquals('2014-04-17', $day->format('Y-m-d'));

        $day = new \DateTime('2014-04-16');
        $this->calendar->addWorkdays($day, 2);

        $this->assertEquals('2014-04-21', $day->format('Y-m-d'));
    }
} 
