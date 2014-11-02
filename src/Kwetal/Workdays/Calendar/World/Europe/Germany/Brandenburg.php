<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\Workdays\Calendar\World\Europe\Germany;


class Brandenburg extends Germany
{
    public function getLocalHolidays($year)
    {
        return array_merge(
            parent::getLocalHolidays($year),
            $this->getReformationDay($year)
        );
    }

    protected function getReformationDay($year)
    {
        return [sprintf('%s-10-31', $year)];
    }
} 
