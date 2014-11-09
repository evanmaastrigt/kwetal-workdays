<?php
namespace Kwetal\Workdays\Calendar\World\Europe;

use Kwetal\DateUtils\DateTime\DateTime;
use PHPUnit_Framework_TestCase;


class FranceTest extends PHPUnit_Framework_TestCase
{
    public $calendar;

    public function createCalendar($year)
    {
        $this->calendar = new France($year);
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

        $this->assertTrue(in_array(new DateTime('2014-01-01'), $value));
        $this->assertTrue(in_array(new DateTime('2014-05-01'), $value));
        $this->assertTrue(in_array(new DateTime('2014-05-08'), $value));
        $this->assertTrue(in_array(new DateTime('2014-05-29'), $value));
        $this->assertTrue(in_array(new DateTime('2014-06-08'), $value));
        $this->assertTrue(in_array(new DateTime('2014-06-09'), $value));
        $this->assertTrue(in_array(new DateTime('2014-07-14'), $value));
        $this->assertTrue(in_array(new DateTime('2014-08-15'), $value));
        $this->assertTrue(in_array(new DateTime('2014-11-01'), $value));
        $this->assertTrue(in_array(new DateTime('2014-11-11'), $value));
        $this->assertTrue(in_array(new DateTime('2014-12-25'), $value));
    }

    public function testAddWorkDays()
    {
        $this->createCalendar(2014);

        $day = new DateTime('2014-07-12');
        $this->calendar->addWorkdays($day, 1);

        $this->assertEquals('2014-07-15', $day->format('Y-m-d'));

        $day = new DateTime('2014-07-12');
        $this->calendar->addWorkdays($day, 30);

        $this->assertEquals('2014-08-26', $day->format('Y-m-d'));
    }
}
