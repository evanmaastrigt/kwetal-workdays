<?php

namespace Kwetal\Workdays\Calendar\World\Europe;

use Kwetal\DateUtils\DateTime\DateTime;
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

    /**
     * Constructor
     *
     * @param int $year
     */
    public function __construct($year)
    {
        $this->hasAscensionThursday = true;
        $this->labelAscensionThursday = 'Ascension';

        $this->hasWhitSunday = true;
        $this->labelWhitSunday = 'Dimanche de Pentecôte';

        $this->hasWhitMonday = true;
        $this->labelWhitMonday = 'Lundi de Pentecôte';

        $this->hasAllSaints = true;
        $this->labelAllSaints = 'La Toussaint';

        $this->hasAssumption = true;
        $this->labelAssumption = "L'Assomption de Marie";

        $this->hasChristmasSunday = true;
        $this->labelChristmasSunday = 'Noël';

        $this->labelLabourDay = 'Fête des Travailleurs';

        $this->labelNewYearsDay = 'Nouvel an';

        $this->loadHolidays($year);
    }

    /**
     * Load all the holidays fi=or the given year
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
     * Returns all the local holidays for the given year
     *
     * @param int $year
     * @return array
     */
    public function getLocalHolidays($year)
    {
        return array_merge(
            $this->getLabourDay($year),
            $this->getVictoryInEuropeDay($year),
            $this->getBastilleDay($year),
            $this->getArmisticeDay($year)
        );
    }

    /**
     * Returns the Victory Day in Europe Day
     *
     * @param int $year
     * @return array
     */
    protected function getVictoryInEuropeDay($year)
    {
        $day = new DateTime(sprintf('%s-05-08', $year));

        return [$day->addLabel('Fête de la Victoire')];
    }

    /**
     * Returns Bastille day
     *
     * @param int $year
     * @return array
     */
    protected function getBastilleDay($year)
    {
        $day = new DateTime(sprintf('%s-07-14', $year));

        return [$day->addLabel('Fête nationale')];
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

        return [$day->addLabel('Armistice de 1918')];
    }
}
