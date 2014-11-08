<?php

namespace Kwetal\Workdays\Traits;

use Kwetal\DateUtils\DateTime\DateTime;

trait LabourDay
{
    /**
     * @var string $labelLabourDay
     */
    public $labelLabourDay = 'Labour Day';

    /**
     * Returns Labour day
     *
     * @param int $year
     * @return DateTime
     */
    protected function getLabourDay($year)
    {
        $day = new DateTime(sprintf('%s-05-01', $year));

        return [$day->addLabel($this->labelLabourDay)];
    }
} 
