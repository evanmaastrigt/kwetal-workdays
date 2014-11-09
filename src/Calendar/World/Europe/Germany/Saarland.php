<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\Workdays\Calendar\World\Europe\Germany;

class Saarland extends Germany
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
        $this->hasAssumption = true;

        parent::__construct($year);
    }
} 
