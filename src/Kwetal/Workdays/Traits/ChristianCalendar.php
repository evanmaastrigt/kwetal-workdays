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
     * @var bool $hasAnnunciation
     */
    public $hasAnnunciation = false;

    /**
     * @var bool $hasCleanMonday
     */
    public $hasCleanMonday = false;

    /**
     * @var bool $hasAshWednesday
     */
    public $hasAshWednesday = false;

    /**
     * @var bool $hasHolyThursday
     */
    public $hasHolyThursday = false;

    /**
     * @var bool $hasGoodFriday
     */
    public $hasGoodFriday = false;

    /**
     * @var bool $hasEasterSaturday
     */
    public $hasEasterSaturday = false;

    /**
     * @var bool $hasEasterSunday
     */
    public $hasEasterSunday = false;

    /**
     * @var bool $hasEasterMonday
     */
    public $hasEasterMonday = false;

    /**
     * @var bool $hasAscensionThursday
     */
    public $hasAscensionThursday = false;
    /**
     * @var bool $hasWithSunday
     */
    public $hasWhitSunday = false;

    /**
     * @var bool $whitMonday
     */
    public $hasWhitMonday = false;

    /**
     * @var bool $hasCorpusChristi
     */
    public $hasCorpusChristi = false;

    /**
     * @var bool $hasAssumption
     */
    public $hasAssumption = false;

    /**
     * @var bool $hasAllSaints
     */
    public $hasAllSaints = false;

    /**
     * @var bool $hasAllSouls
     */
    public $hasAllSouls = false;

    /**
     * @var bool $hasImmaculateConception
     */
    public $hasImmaculateConception = false;

    /**
     * @var bool $hasChristmasEve
     */
    public $hasChristmasEve = false;

    /**
     * @var bool $hasChristmasSunday
     */
    public $hasChristmasSunday = false;

    /**
     * @var bool $hasChristmasMonday
     */
    public $hasChristmasMonday = false;

    /**
     * @param $year
     * @return array
     */
    public function getVariableHolidaysChristian($year)
    {
        $variableDays = [];

        if ($this->hasCleanMonday) {
            $variableDays[] = $this->getCleanMonday($year);
        }
        if ($this->hasAshWednesday) {
            $variableDays[] = $this->getAshWednesday($year);
        }
        if ($this->hasHolyThursday) {
            $variableDays[] = $this->getHolyThursday($year);
        }
        if ($this->hasGoodFriday) {
            $variableDays[] = $this->getGoodFriday($year);
        }
        if ($this->hasEasterSaturday) {
            $variableDays[] = $this->getEasterSaturday($year);
        }
        if ($this->hasEasterSunday) {
            $variableDays[] = $this->getEasterSunday($year);
        }
        if ($this->hasEasterMonday) {
            $variableDays[] = $this->getEasterMonday($year);
        }
        if ($this->hasAscensionThursday) {
            $variableDays[] = $this->getAscensionThursday($year);
        }
        if ($this->hasWhitSunday) {
            $variableDays[] = $this->getWhitSunday($year);
        }
        if ($this->hasWhitMonday) {
            $variableDays[] = $this->getWhitMonday($year);
        }
        if ($this->hasCorpusChristi)
        {
            $variableDays[] = $this->getCorpusChristi($year);
        }


        return $variableDays;
    }

    public function getFixedHolidaysChristian($year)
    {
        $fixedDays = [];

        if ($this->hasEpiphany) {
            $fixedDays[] = $this->getEpiphany($year);
        }
        if ($this->hasAnnunciation){
            $fixedDays[] = $this->getAnnunciation($year);
        }
        if ($this->hasAssumption) {
            $fixedDays[] = $this->getAssumption($year);
        }
        if ($this->hasAllSaints) {
            $fixedDays[] = $this->getAllSaints($year);
        }
        if ($this->hasAllSouls) {
            $fixedDays[] = $this->getAllSouls($year);
        }
        if ($this->hasImmaculateConception) {
            $fixedDays[] = $this->getImmaculateConception($year);
        }
        if ($this->hasChristmasEve) {
            $fixedDays[] = $this->getChristmasEve($year);
        }
        if ($this->hasChristmasSunday) {
            $fixedDays[] = $this->getChristmasSunday($year);
        }
        if ($this->hasChristmasMonday) {
            $fixedDays[] = $this->getChristmasMonday($year);
        }

        return $fixedDays;
    }

    private function getEpiphany($year)
    {
        return sprintf('%s-01-06', $year);
    }

    private function getAnnunciation($year)
    {
        return sprintf('%s-03-25', $year);
    }

    private function getCleanMonday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P48D'))
            ->format('Y-m-d');
    }

    private function getAshWednesday($year) {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P46D'))
            ->format('Y-m-d');
    }

    private function getHolyThursday($year) {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P3D'))
            ->format('Y-m-d');
    }

    private function getGoodFriday($year) {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P2D'))
            ->format('Y-m-d');
    }

    private function getEasterSaturday($year) {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P1D'))
            ->format('Y-m-d');
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

    private function getAscensionThursday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P39D'))
            ->format('Y-m-d');
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

    private function getCorpusChristi($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P60D'))
            ->format('Y-m-d');
    }

    private function getAssumption($year)
    {
        return sprintf('%s-08-15', $year);
    }

    private function getAllSaints($year)
    {
        return sprintf('%s-11-01', $year);
    }

    private function getAllSouls($year)
    {
        return sprintf('%s-11-02', $year);
    }

    private function getImmaculateConception($year)
    {
        return sprintf('%s-12-08', $year);
    }

    private function getChristmasEve($year)
    {
        return sprintf('%s-12-24', $year);
    }

    private function getChristmasSunday($year)
    {
        return sprintf('%s-12-25', $year);
    }

    private function getChristmasMonday($year)
    {
        return sprintf('%s-12-26', $year);
    }
}
