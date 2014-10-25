<?php

namespace Kwetal\Workdays\Calendar\World\Europe;

use Kwetal\Workdays\Calendar\CalendarBase;
use Kwetal\Workdays\Traits\WesternCalendar;
use Kwetal\Workdays\Traits\ChristianCalendar;

class Netherland extends CalendarBase
{
    use WesternCalendar, ChristianCalendar;

    private $holidays = [];

    public function __construct()
    {
        $this->hasEasterSunday = true;
        $this->hasEasterMonday = true;
    }

    public function addHolidays($year)
    {
        $this->holidays = array_merge(
            $this->holidays,
            $this->getVariableHolidaysChristian($year),
            $this->getVariableHolidaysWestern($year),
            $this->getFixedHolidaysChristian($year),
            $this->getFixedHolidaysWestern($year)
        );

        return $this->holidays;
    }
}

