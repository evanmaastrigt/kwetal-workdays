<?php

namespace Kwetal\Workdays\Calendar\World\Europe;

use Kwetal\DateUtils\DateTime\DateTime;
use Kwetal\Workdays\Calendar\CalendarBase;
use Kwetal\Workdays\Calendar\CalendarInterface;
use Kwetal\Workdays\Traits\WesternCalendar;
use Kwetal\Workdays\Traits\ChristianCalendar;

class Netherland extends CalendarBase implements CalendarInterface
{
    use WesternCalendar,
        ChristianCalendar;

    /**
     * Constructor
     *
     * @param int $year
     */
    public function __construct($year)
    {
        $this->hasEasterSunday = true;
        $this->labelEasterSunday = 'Eerste Paaasdag';

        $this->hasEasterMonday = true;
        $this->labelEasterMonday = 'Tweede Paasdag';

        $this->hasAscensionThursday = true;
        $this->labelAscensionThursday = 'Hemelsvaart dag';

        $this->hasWhitSunday = true;
        $this->labelWhitSunday = 'Eerste Pinksterdag';

        $this->hasWhitMonday = true;
        $this->labelWhitMonday = 'Tweede Pinsterdag';

        $this->hasChristmasSunday = true;
        $this->labelChristmasSunday = 'Eerste Kerstdag';

        $this->hasChristmasMonday = true;
        $this->labelChristmasMonday = 'Tweede Kerstdag';

        $this->labelNewYearsDay = 'Nieuwjaarsdag';

        $this->loadHolidays($year);
    }

    /**
     * Loads all the holidays for the specified year
     *
     * @param int $year
     */
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

    /**
     * Returns all the local holidays for the specified year
     *
     * @param int $year
     * @return array
     */
    public function getLocalHolidays($year)
    {
        return array_merge(
            $this->getMonarchDay($year),
            $this->getLiberationDay($year)
        );
    }

    /**
     * Return Monarch day for the given year
     *
     * @param int $year
     * @return array
     */
    protected  function getMonarchDay($year)
    {
        if ($year < 1885) {
            return [];
        }
        if ($year < 1948) {
            $day = new DateTime(sprintf('%s-08-31', $year));

            return [$day->addLabel('Koninginnedag')];
        }
        if ($year < 2014) {
            $day = new DateTime(sprintf('%s-04-30', $year));
            if ($day->format('D') == 'Sun') {
                $day->sub(new \DateInterval('P1D'));
            }
            return [$day->addLabel('Koninginnedag')];
        }

        $day = new DateTime(sprintf('%s-04-27', $year));
        if ($day->format('D') == 'Sun') {
            $day->sub(new \DateInterval('P1D'));
        }
        return [$day->addLabel('Koningsday')];
    }

    /**
     * Return Liberation day for the given year
     *
     * @param int $year
     * @return array
     */
    protected function getLiberationDay($year)
    {
        if ($year % 5 !== 0) {
            return [];
        }
        $day = new DateTime(sprintf('%s-05-05', $year));

        return [$day->addLabel('Bevrijdingsdag')];
    }
}
