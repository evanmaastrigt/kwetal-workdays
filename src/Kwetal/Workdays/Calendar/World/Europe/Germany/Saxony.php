<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\DateUtils\DateUtils;
use Kwetal\Workdays\Calendar\World\Europe\Germany;
use Kwetal\Workdays\Traits\ReformationDay;

class Saxony extends Germany
{
    use ReformationDay;

    /**
     * Return the local holidays specific for this state
     *
     * @param int $year
     * @return array
     */
    public function getLocalHolidays($year)
    {
        return array_merge(
            parent::getLocalHolidays($year),
            $this->getReformationDay($year),
            $this->getRepentanceDay($year)
        );
    }

    /**
     * Return Repentance day; the first Wednesday before November 23th
     *
     * @param int $year
     * @return array
     */
    protected function getRepentanceDay($year)
    {
        $day = new \DateTime(sprintf('%s-11-23', $year));

        return [DateUtils::getNthWeekdayBefore($day, DateUtils::WED, 1)];
    }
} 
