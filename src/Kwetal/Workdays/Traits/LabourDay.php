<?php

namespace Kwetal\Workdays\Traits;

use Kwetal\DateUtils\DateTime\DateTime;

trait LabourDay
{
    public $labelLabourDay = 'Labour Day';

    protected function getLabourDay($year)
    {
        $day = new DateTime(sprintf('%s-05-01', $year));

        return $day->addLabel($this->labelLabourDay);
    }
} 
