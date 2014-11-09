<?php

namespace Kwetal\Workdays\Calendar\World\Europe;

use Kwetal\DateUtils\DateTime\DateTime;
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

    /**
     * Constructor
     *
     * @param int $year
     */
    public function __construct($year)
    {
        $this->hasEasterSunday = true;
        $this->labelEasterSunday = 'Paaszondag';

        $this->hasEasterMonday = true;
        $this->labelEasterMonday = 'Paasmaandag';

        $this->hasAscensionThursday = true;
        $this->labelAscensionThursday = 'Onze Lieve Heer hemelvaart';

        $this->hasWhitSunday = true;
        $this->labelWhitSunday = 'Pinksterzondag';

        $this->hasWhitMonday = true;
        $this->labelWhitMonday = 'Pinkstermaandag';

        $this->hasAssumption = true;
        $this->labelAssumption = 'Onze Lieve Vrouw hemelvaart';

        $this->hasAllSaints = true;
        $this->labelAllSaints = 'Allerheiligen';

        $this->hasChristmasSunday = true;
        $this->labelChristmasSunday = 'Kerstmis';

        $this->labelNewYearsDay = 'Nieuwjaar';

        $this->labelLabourDay = 'Dag van de arbeid';

        $this->loadHolidays($year);
    }

    /**
     * Load all the holidays for the given year
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
            $this->getNationalDay($year),
            $this->getArmisticeDay($year)
        );
    }

    /**
     * Returns the Belgium National Day
     *
     * @param int $year
     * @return array
     */
    protected function getNationalDay($year)
    {
        $day = new DateTime(sprintf('%s-07-21', $year));

        return [$day->addLabel('Nationale feestdag')];
    }

    /**
     * Returns Armistice day
     *
     * @param int $year
     * @return array
     */
    protected function getArmisticeDay($year)
    {
        $day = new DateTime(sprintf('%s-11-11', $year));

        return [$day->addLabel('Wapenstilstand')];
    }
}
