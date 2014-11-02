<?php

namespace Kwetal\Workdays\Calendar\World\Europe;

use Kwetal\Workdays\Calendar\CalendarBase;
use Kwetal\Workdays\Calendar\CalendarInterface;
use Kwetal\Workdays\Traits\WesternCalendar;
use Kwetal\Workdays\Traits\ChristianCalendar;

class Germany extends CalendarBase implements CalendarInterface
{
    use WesternCalendar, ChristianCalendar;

    public function __construct($year)
    {
        $this->hasEasterSunday = true;
        $this->hasEasterMonday = true;
        $this->hasAscensionThursday = true;
        $this->hasGoodFriday = true;
        $this->hasWhitSunday = true;
        $this->hasWhitMonday = true;
        $this->hasChristmasSunday = true;
        $this->hasChristmasMonday = true;

        $this->loadHolidays($year);
    }

    public function loadHolidays($year)
    {
        if (in_array($year, $this->yearsLoaded)) {
            return;
        }

        $this->holidays = array_merge(
            $this->holidays,
            $this->getHolidaysChristian($year),
            $this->getHolidaysWestern($year),
            $this->getLocalHolidays($year)
        );

        $this->yearsLoaded[] = $year;
    }

    public function getLocalHolidays($year)
    {
        return array_merge(
            $this->getLabourDay($year),
            $this->getGermanUnityDay($year)
        );
    }

    protected function getLabourDay($year)
    {
        return [sprintf('%s-05-01', $year)];
    }

    protected function getGermanUnityDay($year)
    {
        return [sprintf('%s-10-03', $year)];
    }
}
