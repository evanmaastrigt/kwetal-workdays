<?php

namespace Kwetal\Workdays\Traits;

use Kwetal\DateUtils\DateTime\DateTime;

trait ReformationDay
{
    /**
     * @var string $labelReformationDay
     */
    public $labelReformationDay = 'Reformation Day';

    /**
     * Returns Reformation day
     *
     * @param int $year
     * @return DateTime
     */
    protected function getReformationDay($year)
    {
        $day = new DateTime(sprintf('%s-10-31', $year));

        return [$day->addLabel($this->labelReformationDay)];
    }
} 
