<?php
namespace Kwetal\Workdays\Calendar\World\Europe;

use PHPUnit_Framework_TestCase;


class GermanyTest extends PHPUnit_Framework_TestCase
{
    public $calendar;

    public function createCalendar($year)
    {
        $this->calendar = new Germany($year);
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

        $this->assertCount(11, $value);
    }

    public function testGetHolidaysHasAllHolidays()
    {
        $this->createCalendar(2014);
        $value = $this->calendar->getHolidays();

        $this->assertContains('2014-01-01', $value);
        $this->assertContains('2014-04-18', $value);
        $this->assertContains('2014-04-20', $value);
        $this->assertContains('2014-04-21', $value);
        $this->assertContains('2014-05-01', $value);
        $this->assertContains('2014-05-29', $value);
        $this->assertContains('2014-06-08', $value);
        $this->assertContains('2014-06-09', $value);
        $this->assertContains('2014-10-03', $value);
        $this->assertContains('2014-12-25', $value);
        $this->assertContains('2014-12-26', $value);
    }

    public function testAddWorkDays()
    {
        $this->createCalendar(2014);

        $day = new \DateTime('2014-04-12');
        $this->calendar->addWorkdays($day, 10);

        $this->assertEquals('2014-04-29', $day->format('Y-m-d'));

        $day = new \DateTime('2014-10-02');
        $this->calendar->addWorkdays($day, 1);

        $this->assertEquals('2014-10-06', $day->format('Y-m-d'));
    }

}
