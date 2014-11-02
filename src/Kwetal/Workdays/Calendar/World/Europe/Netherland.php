<?php

namespace Kwetal\Workdays\Calendar\World\Europe;

use Kwetal\Workdays\Calendar\CalendarBase;
use Kwetal\Workdays\Calendar\CalendarInterface;
use Kwetal\Workdays\Traits\WesternCalendar;
use Kwetal\Workdays\Traits\ChristianCalendar;

class Netherland extends CalendarBase implements CalendarInterface
{
    use WesternCalendar, ChristianCalendar;

    /**
     * @var array $holidays
     */
    protected  $holidays = [];

    /**
     * @var array $yearsLoaded
     */
    protected  $yearsLoaded = [];

    public function __construct($year)
    {
        $this->hasEasterSunday = true;
        $this->hasEasterMonday = true;
        $this->hasAscensionThursday = true;
        $this->hasWhitSunday = true;
        $this->hasWhitMonday = true;
        $this->hasChristmasSunday = true;
        $this->hasChristmasMonday = true;

        $this->loadHolidays($year);
    }

    public function getHolidays()
    {
        return $this->holidays;
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
            $this->getMonarchDay($year),
            $this->getLiberationDay($year)
        );
    }

    protected  function getMonarchDay($year)
    {
        if ($year < 1885) {
            return [];
        }
        if ($year < 1948) {
            return [sprintf('%s-08-31', $year)];
        }
        if ($year < 2014) {
            $day = new \DateTime(sprintf('%s-04-30', $year));
            if ($day->format('D') == 'Sun') {
                return [sprintf('%s-04-29', $year)];
            }
            return [sprintf('%s-04-30', $year)];
        }

        $day = new \DateTime(sprintf('%s-04-27', $year));
        if ($day->format('D') == 'Sun') {
            return [sprintf('%s-04-26', $year)];
        }
        return [sprintf('%s-04-27', $year)];
    }

    protected function getLiberationDay($year)
    {
        if ($year % 5 !== 0) {
            return [];
        }
        return [sprintf('%s-05-05', $year)];
    }
}

