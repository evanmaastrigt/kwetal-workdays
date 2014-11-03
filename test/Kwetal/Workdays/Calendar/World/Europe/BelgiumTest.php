<?php
namespace Kwetal\Workdays\Calendar\World\Europe;

use PHPUnit_Framework_TestCase;


class BelgiumTest extends PHPUnit_Framework_TestCase
{
    public $calendar;

    public function createCalendar($year)
    {
        $this->calendar = new Belgium($year);
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

        $this->assertContains('2014-01-01', $value);
        $this->assertContains('2014-04-20', $value);
        $this->assertContains('2014-04-21', $value);
        $this->assertContains('2014-05-01', $value);
        $this->assertContains('2014-05-29', $value);
        $this->assertContains('2014-06-08', $value);
        $this->assertContains('2014-06-09', $value);
        $this->assertContains('2014-07-21', $value);
        $this->assertContains('2014-08-15', $value);
        $this->assertContains('2014-11-01', $value);
        $this->assertContains('2014-11-11', $value);
        $this->assertContains('2014-12-25', $value);
        $this->assertContains('2014-12-26', $value);
    }

    public function testAddWorkDays()
    {
        $this->createCalendar(2016);

        $day = new \DateTime('2016-10-31');
        $this->calendar->addWorkdays($day, 10);

        $this->assertEquals('2016-11-16', $day->format('Y-m-d'));

        $day = new \DateTime('2016-10-31');
        $this->calendar->addWorkdays($day, 20);

        $this->assertEquals('2016-11-30', $day->format('Y-m-d'));
    }
}
