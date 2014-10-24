<?php

namespace Kwetal\Workdays\Traits;

use Kwetal\DateUtils\DateUtils;

trait ChristianCalendar
{
    /**
     * @var bool $hasEpiphany
     */
    private $hasEpiphany = false;

    /**
     * @var bool $hasEasterSunday
     */
    protected $hasEasterSunday = false;

    /**
     * @var bool $hasEasterMonday
     */
    private $hasEasterMonday = false;

    private function getVariableHolidaysChristian($year)
    {
        $variableDays = [];

        if ($this->hasEasterSunday) {
            $variableDays[] = DateUtils::getEasterSunday($year)->format('Y-m-d');
        }

        if ($this->hasEasterMonday) {
            $variableDays[] = DateUtils::getEasterSunday($year)
                ->add(new \DateInterval('P1D'))
                ->format('Y-m-d');
        }

        return $variableDays;
    }

    protected  function getFixedHolidaysChristian($year)
    {
        $fixedDays = [];

        if ($this->hasEpiphany) {
            $fixedDays[] = sprintf('%s-01-06', $year);
        }

        return $fixedDays;
    }
}
