<?php

namespace Kwetal\Workdays\Traits;


trait ReformationDay
{
    protected function getReformationDay($year)
    {
        return [sprintf('%s-10-31', $year)];
    }
} 
