<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\Workdays\Calendar\World\Europe\Germany;

class NorthRhineWestphalia extends Germany
{
    /**
     * Constructor
     *
     * @param int $year
     */
    public function __construct($year)
    {
        $this->hasCorpusChristi = true;
        $this->hasAllSaints = true;

        parent::__construct($year);
    }
} 
