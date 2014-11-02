<?php

namespace Kwetal\Workdays\Calendar;

class CalendarBase
{
    /**
     * @return array
     */
    public function getWeekendDays()
    {
        return ['Sat', 'Sun'];
    }

    /**
     * @param \DateTime $day
     * @return bool
     */
    public function isWorkday(\DateTime $day)
    {
        if (in_array($day->format('D'), $this->getWeekendDays())) {
            return false;
        }

        if (in_array($day->format('Y-m-d'), $this->holidays)) {
            return false;
        }

        return true;
    }

    /**
     * @param \DateTime $day
     * @return bool
     */
    public function isHoliday(\DateTime $day)
    {
        return ! $this->isWorkday($day);
    }

    /**
     * @param \DateTime $day
     * @param int $delta
     */
    public function addWorkdays(\DateTime $day, $delta)
    {
        $interval = new \DateInterval('P1D');
        $year = $day->format('Y');

        $numDays = 0;
        while ($numDays < $delta) {
            $day->add($interval);

            if ($day->format('Y') !== $year) {
                $year = $day->format('Y');
                $this->loadHolidays((int) $year);
            }

            if ($this->isWorkday($day)) {
                ++$numDays;
            }
        }
    }

    /**
     * @param \DateTime $day
     * @return \DateTime
     */
    public function getNextWorkday(\DateTime $day)
    {
        $returnDay = clone $day;

        $this->addWorkdays($returnDay, 1);

        return $returnDay;
    }
} 

