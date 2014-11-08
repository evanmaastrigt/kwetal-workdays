<?php

namespace Kwetal\Workdays\Calendar\World\Europe;

use Kwetal\DateUtils\DateTime\DateTime;
use Kwetal\Workdays\Calendar\CalendarBase;
use Kwetal\Workdays\Calendar\CalendarInterface;
use Kwetal\Workdays\Traits\WesternCalendar;
use Kwetal\Workdays\Traits\ChristianCalendar;
use Kwetal\Workdays\Traits\LabourDay;

class Germany extends CalendarBase implements CalendarInterface
{
    use
        WesternCalendar,
        ChristianCalendar,
        LabourDay;

    /**
     * Constuctor
     *
     * @param int $year
     */
    public function __construct($year)
    {
        $this->hasEasterSunday = true;
        $this->labelEasterSunday = 'Ostersontag';

        $this->hasEasterMonday = true;
        $this->labelEasterMonday = 'Ostermontag';

        $this->hasAscensionThursday = true;
        $this->labelAscensionThursday = 'Christi Himmelfahrt';

        $this->hasGoodFriday = true;
        $this->labelGoodFriday = 'Karfreitag';

        $this->hasWhitSunday = true;
        $this->labelWhitSunday = 'Pfingstsontag';

        $this->hasWhitMonday = true;
        $this->labelWhitMonday = 'Pfingstmontag';

        $this->hasChristmasSunday = true;
        $this->labelChristmasSunday = '1. Weinachtstag';

        $this->hasChristmasMonday = true;
        $this->labelChristmasMonday = '2. Weinachtstag';

        $this->labelNewYearsDay = 'Neujahrstag';

        $this->labelEpiphany = 'Heilige Drei Könige';

        $this->labelLabourDay = 'Maifeiertag';

        $this->labelCorpusChristi = 'Fronleichnam';

        $this->labelAssumption = 'Maria Himmelfahrt';

        $this->labelAllSaints = 'Allerheiligen';

        $this->loadHolidays($year);
    }

    /**
     * Loads all the holidays for the given year
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
     * Returns the local holidays for the given year
     *
     * @param int $year
     * @return array
     */
    public function getLocalHolidays($year)
    {
        return array_merge(
            $this->getLabourDay($year),
            $this->getGermanUnityDay($year)
        );
    }

    /**
     * Returns German Unity Day for the given year
     *
     * @param int $year
     * @return array
     */
    protected function getGermanUnityDay($year)
    {
        $day = new DateTime(sprintf('%s-10-03', $year));

        return [$day->addLabel('Tag der Deutschen Einheit')];
    }
}
