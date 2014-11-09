<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\DateUtils\DateTime\DateTime;
use PHPUnit_Framework_TestCase;

class SaxonyAnhaltTest extends PHPUnit_Framework_TestCase
{
    public $calendar;

    public function createCalendar($year)
    {
        $this->calendar = new SaxonyAnhalt($year);
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

        $this->assertTrue(in_array(new DateTime('2014-01-06'), $value));
        $this->assertTrue(in_array(new DateTime('2014-10-31'), $value));
    }

    public function testAddWorkDays()
    {
        $this->createCalendar(2014);

        $day = new DateTime('2014-01-03');
        $this->calendar->addWorkdays($day, 1);

        $this->assertEquals('2014-01-07', $day->format('Y-m-d'));

        $day = new DateTime('2014-10-24');
        $this->calendar->addWorkdays($day, 5);

        $this->assertEquals('2014-11-03', $day->format('Y-m-d'));
    }
} 
