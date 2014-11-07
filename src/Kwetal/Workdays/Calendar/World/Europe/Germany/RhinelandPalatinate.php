<?php

namespace Kwetal\Workdays\Calendar\World\Europe\Germany;

use Kwetal\Workdays\Calendar\World\Europe\Germany;

class RhinelandPalatinate extends Germany
{
    public function __construct($year)
    {
        $this->hasCorpusChristi = true;
        $this->hasAllSaints = true;

        parent::__construct($year);
    }
} 
