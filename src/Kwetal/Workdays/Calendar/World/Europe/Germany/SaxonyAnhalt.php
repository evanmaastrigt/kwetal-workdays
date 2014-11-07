<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\Workdays\Calendar\World\Europe\Germany;
use Kwetal\Workdays\Traits\ReformationDay;

class SaxonyAnhalt extends Germany
{
    use ReformationDay;

    public function __construct($year)
    {
        $this->hasEpiphany = true;

        parent::__construct($year);
    }

    public function getLocalHolidays($year)
    {
        return array_merge(
            parent::getLocalHolidays($year),
            $this->getReformationDay($year)
        );
    }
} 
