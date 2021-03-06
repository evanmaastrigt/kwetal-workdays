<?php
namespace Kwetal\Workdays\Calendar\World\Europe;

use PHPUnit_Framework_TestCase;
use Kwetal\DateUtils\DateTime\DateTime;


class NetherlandTest extends PHPUnit_Framework_TestCase
{
    public $calendar;

    public function createCalendar($year)
    {
        $this->calendar = new Netherland($year);
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

        $this->assertCount(9, $value);
    }

    public function testGetHolidaysHasAllHolidays()
    {
        $this->createCalendar(2014);
        $value = $this->calendar->getHolidays();

        $this->assertTrue(in_array(new DateTime('2014-01-01'), $value));
        $this->assertTrue(in_array(new DateTime('2014-04-20'), $value));
        $this->assertTrue(in_array(new DateTime('2014-04-21'), $value));
        $this->assertTrue(in_array(new DateTime('2014-04-26'), $value));
        $this->assertTrue(in_array(new DateTime('2014-05-29'), $value));
        $this->assertTrue(in_array(new DateTime('2014-06-08'), $value));
        $this->assertTrue(in_array(new DateTime('2014-06-09'), $value));
        $this->assertTrue(in_array(new DateTime('2014-12-25'), $value));
        $this->assertTrue(in_array(new DateTime('2014-12-26'), $value));
    }

    public function testGetAllHolidaysHandelsMonarchDay()
    {
        $this->createCalendar(2014);
        $value = $this->calendar->getHolidays();
        $this->assertTrue(in_array(new DateTime('2014-04-26'), $value));

        $this->createCalendar(2017);
        $value = $this->calendar->getHolidays();
        $this->assertTrue(in_array(new DateTime('2017-04-27'), $value));

        $this->createCalendar(2012);
        $value = $this->calendar->getHolidays();
        $this->assertTrue(in_array(new DateTime('2012-04-30'), $value));

        $this->createCalendar(2006);
        $value = $this->calendar->getHolidays();
        $this->assertTrue(in_array(new DateTime('2006-04-29'), $value));

        $this->createCalendar(2008);
        $value = $this->calendar->getHolidays();
        $this->assertTrue(in_array(new DateTime('2008-04-30'), $value));

        $this->createCalendar(1930);
        $value = $this->calendar->getHolidays();
        $this->assertTrue(in_array(new DateTime('1930-08-31'), $value));

        $this->createCalendar(1880);
        $value = $this->calendar->getHolidays();
        $this->assertFalse(in_array(new DateTime('1880-08-31'), $value));
    }

    public function testGetAllHolidaysHandelsLiberationDay()
    {
        $this->createCalendar(2014);
        $value = $this->calendar->getHolidays();
        $this->assertFalse(in_array(new DateTime('2014-05-05'), $value));

        $this->createCalendar(2015);
        $value = $this->calendar->getHolidays();
        $this->assertTrue(in_array(new DateTime('2015-05-05'), $value));
    }

    public function testAddWorkDays()
    {
        $this->createCalendar(2014);

        $day = new DateTime('2014-12-19');
        $this->calendar->addWorkdays($day, 20);

        $this->assertEquals('2015-01-21', $day->format('Y-m-d'));
    }
}
