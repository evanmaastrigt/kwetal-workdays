<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\Workdays\Calendar\World\Europe\Germany;
use Kwetal\Workdays\Traits\ReformationDay;

class Thuringia extends Germany
{
    use ReformationDay;

    /**
     * Constructor
     *
     * @param int $year
     */
    public function __construct($year)
    {
        parent::__construct($year);

        $this->labelReformationDay = 'Reformationstag';
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
