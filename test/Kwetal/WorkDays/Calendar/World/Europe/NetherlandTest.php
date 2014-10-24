<?php
namespace Kwetal\WorkDays\Calendar\World\Europe;

use PHPUnit_Framework_TestCase;


class NetherlandTest extends PHPUnit_Framework_TestCase
{
    Public function testNetherland()
    {
        $netherland = new Netherland();

        $netherland->addHolidays(2014);
    }
}
