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
     * Returns the variable Chritian Holydays.
     *
     * @param int $year
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

    /**
     * Returns the fixed (not-variable) Christian Holidays
     *
     * @param int $year
     * @return array
     */
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

    /**
     * Returns all the Christian holydays
     *
     * @param int $year
     * @return array
     */
    public function getHolidaysChristian($year)
    {
        return array_merge(
            $this->getVariableHolidaysChristian($year),
            $this->getFixedHolidaysChristian($year)
        );
    }

    /**
     * Returns Epiphany day
     *
     * @param $year
     * @return DateTime
     */
    private function getEpiphany($year)
    {
        $day = new DateTime(sprintf('%s-01-06', $year));

        return $day->addLabel($this->labelEpiphany);
    }

    /**
     * Returns Annunciaton day
     *
     * @param int $year
     * @return DateTime
     */
    private function getAnnunciation($year)
    {
        $day = new DateTime(sprintf('%s-03-25', $year));
        return $day->addLabel($this->labelAnnunciation);
    }

    /**
     * Returns Clean Monday
     *
     * @param int $year
     * @return DateTime
     */
    private function getCleanMonday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P48D'))
            ->addLabel($this->labelCleanMonday);

    }

    /**
     * Returns Ash Wednesday
     *
     * @param int $year
     * @return DateTime
     */
    private function getAshWednesday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P46D'))
            ->addLabel($this->labelAshWednesday);
    }

    /**
     * Returns Holy Thursday
     *
     * @param int $year
     * @return DateTime
     */
    private function getHolyThursday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P3D'))
            ->addLabel($this->labelHolyThursday);
    }

    /**
     * Returns Good Friday
     *
     * @param int $year
     * @return DateTime
     */
    private function getGoodFriday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P2D'))
            ->addLabel($this->labelGoodFriday);
    }

    /**
     * Returns Easter Saturday
     *
     * @param int $year
     * @return DateTime
     */
    private function getEasterSaturday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->sub(new \DateInterval('P1D'))
            ->addLabel($this->labelEasterSaturday);
    }

    /**
     * Returns Easter Sunday
     *
     * @param int $year
     * @return DateTime
     */
    private function getEasterSunday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->addLabel($this->labelEasterSunday);
    }

    /**
     * Returns Easter Monday
     *
     * @param int $year
     * @return DateTime
     */
    private function getEasterMonday($year)
    {
        return DateUtils::getEasterSunday($year)
                ->add(new \DateInterval('P1D'))
                ->addLabel($this->labelEasterMonday);
    }

    /**
     * Returns Ascension Thursday
     *
     * @param int $year
     * @return DateTime
     */
    private function getAscensionThursday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P39D'))
            ->addLabel($this->labelAscensionThursday);
    }

    /**
     * Returns Whit Sunday
     *
     * @param int $year
     * @return DateTime
     */
    private function getWhitSunday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P49D'))
            ->addLabel($this->labelWhitSunday);
    }

    /**
     * Returns Whit Monday
     *
     * @param int $year
     * @return DateTime
     */
    private function getWhitMonday($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P50D'))
            ->addLabel($this->labelWhitMonday);
    }

    /**
     * Returns Corpus Christi
     *
     * @param int $year
     * @return DateTime
     */
    private function getCorpusChristi($year)
    {
        return DateUtils::getEasterSunday($year)
            ->add(new \DateInterval('P60D'))
            ->addLabel($this->labelCorpusChristi);
    }

    /**
     * Returns Assumption day
     *
     * @param int $year
     * @return DateTime
     */
    private function getAssumption($year)
    {
        $day = new DateTime(sprintf('%s-08-15', $year));

        return $day->addLabel($this->labelAssumption);
    }

    /**
     * Returns All Saints day
     *
     * @param int $year
     * @return DateTime
     */
    private function getAllSaints($year)
    {
        $day = new DateTime(sprintf('%s-11-01', $year));

        return $day->addLabel($this->labelAllSaints);
    }

    /**
     * Returns All Souls day
     *
     * @param int $year
     * @return DateTime
     */
    private function getAllSouls($year)
    {
        $day = new DateTime(sprintf('%s-11-02', $year));

        return $day->addLabel($this->labelAllSouls);
    }

    /**
     * Returns Immaculate Conception
     *
     * @param int $year
     * @return DateTime
     */
    private function getImmaculateConception($year)
    {
        $day = new DateTime(sprintf('%s-12-08', $year));

        return $day->addLabel($this->labelImmaculateConception);
    }

    /**
     * Returns Christmas Eve
     *
     * @param int $year
     * @return DateTime
     */
    private function getChristmasEve($year)
    {
        $day = new DateTime(sprintf('%s-12-24', $year));

        return $day->addLabel($this->labelChristmasEve);
    }

    /**
     * Returns Christmas Sunday
     *
     * @param int $year
     * @return DateTime
     */
    private function getChristmasSunday($year)
    {
        $day = new DateTime(sprintf('%s-12-25', $year));

        return $day->addLabel($this->labelChristmasSunday);
    }

    /**
     * Returns Christmas Monday
     *
     * @param int $year
     * @return DateTime
     */
    private function getChristmasMonday($year)
    {
        $day = new DateTime(sprintf('%s-12-26', $year));

        return $day->addLabel($this->labelChristmasMonday);
    }
}
