<?php

namespace Kwetal\Workdays\Traits;

use Kwetal\DateUtils\DateTime\DateTime;

trait WesternCalendar
{
    /**
     * @var string $labelNewYearsDay
     */
    public $labelNewYearsDay = 'New Years Day';

    /**
     * Returns the variable holidays in the Western Calendar
     *
     * @param int $year
     * @return array
     */
    public function getVariableHolidaysWestern($year)
    {
        return [];
    }

    /**
     * Returns the fixed (non-variable) holidays in the Western calendar
     * @param int $year
     * @return array
     */
    public function getFixedHolidaysWestern($year)
    {
        $day = new DateTime(sprintf('%s-01-01', $year));

        return [$day->addLabel($this->labelNewYearsDay)];
    }

    /**
     * Returns all the holidays in the Western Calendar
     *
     * @param int $year
     * @return array
     */
    public function getHolidaysWestern($year)
    {
        return array_merge(
            $this->getVariableHolidaysWestern($year),
            $this->getFixedHolidaysWestern($year)
        );
    }
} 
