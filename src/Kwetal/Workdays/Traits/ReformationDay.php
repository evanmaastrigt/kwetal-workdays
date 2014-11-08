<?php

namespace Kwetal\Workdays\Traits;

use Kwetal\DateUtils\DateTime\DateTime;

trait ReformationDay
{
    public $labelReformationDay = 'Reformation Day';

    protected function getReformationDay($year)
    {
        $day = new DateTime(sprintf('%s-10-31', $year));

        return $day->addLabel($this->labelReformationDay);
    }
} 
