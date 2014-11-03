<?php

namespace Kwetal\Workdays\Calendar\World\Europe;

use Kwetal\Workdays\Calendar\CalendarBase;
use Kwetal\Workdays\Calendar\CalendarInterface;
use Kwetal\Workdays\Traits\WesternCalendar;
use Kwetal\Workdays\Traits\ChristianCalendar;
use Kwetal\Workdays\Traits\LabourDay;

class France extends CalendarBase implements CalendarInterface
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
        $this->hasAllSaints = true;
        $this->hasAssumption = true;
        $this->hasChristmasSunday = true;

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
            $this->getVictoryInEuropeDay($year),
            $this->getBastilleDay($year),
            $this->getArmisticeDay($year)
        );
    }

    protected function getVictoryInEuropeDay($year)
    {
        return [sprintf('%s-05-08', $year)];
    }

    protected function getBastilleDay($year)
    {
        return [sprintf('%s-07-14', $year)];
    }

    protected function getArmisticeDay($year)
    {
        return [sprintf('%s-11-11', $year)];
    }
}
