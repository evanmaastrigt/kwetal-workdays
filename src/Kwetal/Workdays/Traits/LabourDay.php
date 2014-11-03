<?php

namespace Kwetal\Workdays\Traits;

trait LabourDay
{
    protected function getLabourDay($year)
    {
        return [sprintf('%s-05-01', $year),];
    }
} 
