<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\Workdays\Calendar\World\Europe\Germany;
use Kwetal\Workdays\Traits\ReformationDay;

class SaxonyAnhalt extends Germany
{
    use ReformationDay;

    /**
     * Constructor
     *
     * @param int $year
     */
    public function __construct($year)
    {
        $this->hasEpiphany = true;

        parent::__construct($year);
    }

    /**
     * Returns all the local holidays for the given year
     *
     * @param int $year
     * @return array
     */
    public function getLocalHolidays($year)
    {
        return array_merge(
            parent::getLocalHolidays($year),
            $this->getReformationDay($year)
        );
    }
} 
