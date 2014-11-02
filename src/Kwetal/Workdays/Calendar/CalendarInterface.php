<?php

namespace Kwetal\Workdays\Calendar;

interface CalendarInterface
{
    public function __construct($year);

    public function getHolidays();

    public function loadHolidays($year);

    public function getLocalHolidays($year);
}
