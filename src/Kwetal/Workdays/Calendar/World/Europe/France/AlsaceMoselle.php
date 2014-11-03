<?php

namespace Kwetal\Workdays\Calendar\World\Europe\France;

use Kwetal\Workdays\Calendar\World\Europe\France;

class AlsaceMoselle extends France
{
    public function __construct($year)
    {
        $this->hasGoodFriday = true;
        $this->hasChristmasMonday = true;

        parent::__construct($year);
    }
} 
