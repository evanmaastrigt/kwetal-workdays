<?php

namespace Kwetal\Workdays\Calendar\World\Europe;

use Kwetal\Workdays\Calendar\CalendarBase;
use Kwetal\Workdays\Calendar\CalendarInterface;
use Kwetal\Workdays\Traits\WesternCalendar;
use Kwetal\Workdays\Traits\ChristianCalendar;
use Kwetal\Workdays\Traits\LabourDay;

class Belgium extends CalendarBase implements CalendarInterface
{
    use
        WesternCalendar,
        ChristianCalendar,
        LabourDay;

    public function __construct($year)
    {
        $this->hasEasterSunday = true;
        $this->hasEasterMonday = true;
        $this->hasAscensionThursday = true;
        $this->hasWhitSunday = true;
        $this->hasWhitMonday = true;
        $this->hasAssumption = true;
        $this->hasAllSaints = true;
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
            $this->getTheOtherLabourDay($year),
            $this->getArmisticeDay($year)
        );
    }

    protected function getTheOtherLabourDay($year)
    {
        return [sprintf('%s-07-21', $year),];
    }

    protected function getArmisticeDay($year)
    {
        return [sprintf('%s-11-11', $year)];
    }
}
