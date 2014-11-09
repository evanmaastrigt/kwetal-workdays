<?php

namespace Kwetal\Workdays\Calendar;

class CalendarBase
{
    /**
     * @var array $holidays
     */
    protected $holidays = [];

    /**
     * @var array $yearsLoaded
     */
    protected $yearsLoaded = [];


    /**
     * Return the loaded holidays
     *
     * @return array
     */
    public function getHolidays()
    {
        return $this->holidays;
    }

    /**
     * Returns the weekend days for this calendar
     *
     * @return array
     */
    public function getWeekendDays()
    {
        return ['Sat', 'Sun'];
    }

    /**
     * Answer if the given day is a workday in this calendar
     *
     * @param \DateTimeInterface $day
     * @return bool
     */
    public function isWorkday(\DateTimeInterface $day)
    {
        if (in_array($day->format('D'), $this->getWeekendDays())) {
            return false;
        }

        if (in_array($day, $this->holidays)) {
            return false;
        }

        return true;
    }

    /**
     * Answer if the given day is a holiday in this calendar
     *
     * @param \DateTimeInterface $day
     * @return bool
     */
    public function isHoliday(\DateTimeInterface $day)
    {
        return !$this->isWorkday($day);
    }

    /**
     * Add a number of workingdays to a day
     *
     * @param \DateTimeInterface $day
     * @param int $delta
     */
    public function addWorkdays(\DateTimeInterface $day, $delta)
    {
        $interval = new \DateInterval('P1D');
        $year = $day->format('Y');

        $numDays = 0;
        while ($numDays < $delta) {
            $day->add($interval);

            if ($day->format('Y') !== $year) {
                $year = $day->format('Y');
                $this->loadHolidays((int)$year);
            }

            if ($this->isWorkday($day)) {
                ++$numDays;
            }
        }
    }

    /**
     * Returns the next workday
     *
     * @param \DateTimeInterface $day
     * @return \DateTime
     */
    public function getNextWorkday(\DateTimeInterface $day)
    {
        $returnDay = clone $day;

        $this->addWorkdays($returnDay, 1);

        return $returnDay;
    }
}
