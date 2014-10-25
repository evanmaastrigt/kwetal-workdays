<?php
namespace Kwetal\Workdays\Calendar\World\Europe;

use PHPUnit_Framework_TestCase;


class NetherlandTest extends PHPUnit_Framework_TestCase
{
    Public function testNetherland()
    {
        $this->markTestSkipped('Does not do anything at this moment');

        $netherland = new Netherland();

        $netherland->addHolidays(2014);
    }
}
