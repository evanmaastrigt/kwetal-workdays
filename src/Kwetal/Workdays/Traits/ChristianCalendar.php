<?php

namespace Kwetal\Workdays\Traits;

use Kwetal\DateUtils\DateUtils;
use Kwetal\DateUtils\DateTime\DateTime;

trait ChristianCalendar
{
    /**
     * @var bool $hasEpiphany
     */
    public $hasEpiphany = false;

    /**
     * @var string $labelEpiphany
     */
    public $labelEpiphany = 'Epiphany';

    /**
     * @var bool $hasAnnunciation
     */
    public $hasAnnunciation = false;

    /**
     * @var string $labelAnnunciation
     */
    public $labelAnnunciation = 'Annunciation';

    /**
     * @var bool $hasCleanMonday
     */
    public $hasCleanMonday = false;

    /**
     * @var string $labelCleanMonday
     */
    public $labelCleanMonday = 'Clean Monday';

    /**
     * @var bool $hasAshWednesday
     */
    public $hasAshWednesday = false;

    /**
     * @var string $labelAshWednesday
     */
    public $labelAshWednesday = 'Ash Wednesday';

    /**
     * @var bool $hasHolyThursday
     */
    public $hasHolyThursday = false;

    /**
     * @var string $labelHolyThursday
     */
    public $labelHolyThursday = 'Holy Thursday';

    /**
     * @var bool $hasGoodFriday
     */
    public $hasGoodFriday = false;

    /**
     * @var string $labelGoodFriday
     */
    public $labelGoodFriday = 'Good Friday';

    /**
     * @var bool $hasEasterSaturday
     */
    public $hasEasterSaturday = false;

    /**
     * @var string $labelEasterSaturday
     */
    public $labelEasterSaturday = 'Easter Saturday';

    /**
     * @var bool $hasEasterSunday
     */
    public $hasEasterSunday = false;

    /**
     * @var string $labelEasterSunday
     */
    public $labelEasterSunday = 'Easter Sunday';

    /**
     * @var bool $hasEasterMonday
     */
    public $hasEasterMonday = false;

    /**
     * @var string $labelEasterMonday
     */
    public $labelEasterMonday = 'Easter Monday';

    /**
     * @var bool $hasAscensionThursday
     */
    public $hasAscensionThursday = false;

    /**
     * @var string $labelAscensionThursday
     */
    public $labelAscensionThursday = 'Ascension Thursday';

    /**
     * @var bool $hasWithSunday
     */
    public $hasWhitSunday = false;

    /**
     * @var string $labelWhitSunday
     */
    public $labelWhitSunday = 'Whit Sunday';

    /**
     * @var bool $whitMonday
     */
    public $hasWhitMonday = false;

    /**
     * @var string $labelWhitMonday
     */
    public $labelWhitMonday = 'Whit Monday';

    /**
     * @var bool $hasCorpusChristi
     */
    public $hasCorpusChristi = false;

    /**
     * @var string $labelCorpusChristi
     */
    public $labelCorpusChristi = 'Corpus Christi';

    /**
     * @var bool $hasAssumption
     */
    public $hasAssumption = false;

    /**
     * @var string $labelAssumption
     */
    public $labelAssumption = 'Assumption';

    /**
     * @var bool $hasAllSaints
     */
    public $hasAllSaints = false;

    /**
     * @var string $labelAllSaints
     */
    public $labelAllSaints = 'All Saints';

    /**
     * @var bool $hasAllSouls
     */
    public $hasAllSouls = false;

    /**
     * @var string $labelAllSouls
     */
    public $labelAllSouls = 'All Saints';

    /**
     * @var bool $hasImmaculateConception
     */
    public $hasImmaculateConception = false;

    /**
     * @var string $labelImmaculateConception
     */
    public $labelImmaculateConception = 'Immaculate Conception';

    /**
     * @var bool $hasChristmasEve
     */
    public $hasChristmasEve = false;

    /**
     * @var string $labelChristmasEve
     */
    public $labelChristmasEve = 'Christmas Eve';

    /**
     * @var bool $hasChristmasSunday
     */
    public $hasChristmasSunday = false;

    /**
     * @var string $labelChristmasSunday
     */
    public $labelChristmasSunday = 'Christmas Sunday';

    /**
     * @var bool $hasChristmasMonday
     */
    public $hasChristmasMonday = false;

    /**
     * @var string $labelChristmasMonday
     */
    public $labelChristmasMonday = 'Christmas Monday';

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

    public function getHolidaysChristian($year)
    {
        return array_merge(
            $this->getVariableHolidaysChristian($year),
            $this->getFixedHolidaysChristian($year)
        );
    }

    private function getEpiphany($year)
    {
        $day = new DateTime('%s-01-06', $year);

        return $day->addLabel($this->labelEpiphany);
    }

    private function getAnnunciation($year)
    {
        $day = new DateTime('%s-03-25', $year);
        return $day->addLabel($this->labelAnnunciation);
    }

    private function getCleanMonday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P48D'))
            ->addLabel($this->labelCleanMonday);

    }

    private function getAshWednesday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P46D'))
            ->addLabel($this->labelAshWednesday);
    }

    private function getHolyThursday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P3D'))
            ->addLabel($this->labelHolyThursday);
    }

    private function getGoodFriday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P2D'))
            ->addLabel($this->labelGoodFriday);
    }

    private function getEasterSaturday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P1D'))
            ->addLabel($this->labelEasterSaturday);
    }

    private function getEasterSunday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->addLabel($this->labelEasterSunday);
    }

    private function getEasterMonday($year)
    {
        return DateUtils::getEasterSunday($year)
                ->add(new \DateInterval('P1D'))
                ->addLabel($this->labelEasterMonday);
    }

    private function getAscensionThursday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P39D'))
            ->addLabel($this->labelAscensionThursday);
    }

    private function getWhitSunday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P49D'))
            ->addLabel($this->labelWhitSunday);
    }

    private function getWhitMonday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P50D'))
            ->addLabel($this->labelWhitMonday);
    }

    private function getCorpusChristi($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P60D'))
            ->addLabel($this->labelCorpusChristi);
    }

    private function getAssumption($year)
    {
        $day = new DateTime(sprintf('%s-08-15', $year));

        return $day->addLabel($this->labelAssumption);
    }

    private function getAllSaints($year)
    {
        $day = new DateTime(sprintf('%s-11-01', $year));

        return $day->addLabel($this->labelAllSaints);
    }

    private function getAllSouls($year)
    {
        $day = new DateTime(sprintf('%s-11-02', $year));

        return $day->addLabel($this->labelAllSouls);
    }

    private function getImmaculateConception($year)
    {
        $day = new DateTime(sprintf('%s-12-08', $year));

        return $day->addLabel($this->labelImmaculateConception);
    }

    private function getChristmasEve($year)
    {
        $day = new DateTime(sprintf('%s-12-24', $year));

        return $day->addLabel($this->labelChristmasEve);
    }

    private function getChristmasSunday($year)
    {
        $day = new DateTime(sprintf('%s-12-25', $year));

        return $day->addLabel($this->labelChristmasSunday);
    }

    private function getChristmasMonday($year)
    {
        $day = new DateTime(sprintf('%s-12-26', $year));

        return $day->addLabel($this->labelChristmasMonday);
    }
}
