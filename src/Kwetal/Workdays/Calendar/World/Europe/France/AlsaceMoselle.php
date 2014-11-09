<?php

namespace Kwetal\Workdays\Calendar\World\Europe\France;

use Kwetal\Workdays\Calendar\World\Europe\France;

class AlsaceMoselle extends France
{
    /**
     * Constructor
     *
     * @param int $year
     */
    public function __construct($year)
    {
        $this->hasGoodFriday = true;
        $this->labelGoodFriday = 'Le Vendredi saint)';

        $this->hasChristmasMonday = true;
        $this->labelChristmasMonday = 'Saint-Étienne';

        parent::__construct($year);
    }
} 
