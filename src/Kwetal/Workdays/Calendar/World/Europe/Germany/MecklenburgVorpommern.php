<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\Workdays\Calendar\World\Europe\Germany;
use Kwetal\Workdays\Traits\ReformationDay;

class MecklenburgVorpommern extends Germany
{
    use ReformationDay;

    public function getLocalHolidays($year)
    {
        return array_merge(
            parent::getLocalHolidays($year),
            $this->getReformationDay($year)
        );
    }
} 
