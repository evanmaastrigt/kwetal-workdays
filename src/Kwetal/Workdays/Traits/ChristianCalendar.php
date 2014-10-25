<?php

namespace Kwetal\Workdays\Traits;

use Kwetal\DateUtils\DateUtils;

trait ChristianCalendar
{
    /**
     * @var bool $hasEpiphany
     */
    public $hasEpiphany = false;

    /**
     * @var bool $hasEasterSunday
     */
    public $hasEasterSunday = false;

    /**
     * @var bool $hasEasterMonday
     */
    public $hasEasterMonday = false;

    /**
     * @var bool $hasWithSunday
     */
    public $hasWhitSunday = false;

    /**
     * @var bool $whitMonday
     */
    public $hasWhitMonday = false;

    /**
     * @param $year
     * @return array
     */
    public function getVariableHolidaysChristian($year)
    {
        $variableDays = [];

        if ($this->hasEasterSunday) {
            $variableDays[] = $this->getEasterSunday($year);
        }
        if ($this->hasEasterMonday) {
            $variableDays[] = $this->getEasterMonday($year);
        }
        if ($this->hasWhitSunday) {
            $variableDays[] = $this->getWhitSunday($year);
        }
        if ($this->hasWhitMonday) {
            $variableDays[] = $this->getWhitMonday($year);
        }


        return $variableDays;
    }

    public function getFixedHolidaysChristian($year)
    {
        $fixedDays = [];

        if ($this->hasEpiphany) {
            $fixedDays[] = $this->getEpiphany($year);
        }

        return $fixedDays;
    }

    private function getEpiphany($year)
    {
        return sprintf('%s-01-06', $year);
    }

    private function getEasterSunday($year)
    {
        return DateUtils::getEasterSunday($year)->format('Y-m-d');
    }

    private function getEasterMonday($year)
    {
        $day = DateUtils::getEasterSunday($year);
        $day->add(new \DateInterval('P1D'));

        return $day->format('Y-m-d');
    }

    private function getWhitSunday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P49D'))
            ->format('Y-m-d');
    }

    private function getWhitMonday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P50D'))
            ->format('Y-m-d');
    }
}
