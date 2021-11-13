<?php

namespace ToolstudIo\SiFormat\Tests;

use PHPUnit\Framework\TestCase;
use ToolstudIo\SiFormat\SiFormat;

class SiFormatTest extends TestCase
{
    public function testFormatMeter(): void
    {
        $si=new SiFormat();
        $this->assertEquals("1m",$si->format(1),"1");
        $this->assertEquals("0.1m",$si->format(.1),"1");
        $this->assertEquals("10mm",$si->format(.01),"1");
        $this->assertEquals("1mm",$si->format(.001),"1");
        $this->assertEquals("1Km",$si->format(1000),"1 kilometer");
        $this->assertEquals("0.5mm",$si->format(.0005),".5 millimeter");
        $this->assertEquals("0.81nm",$si->format(1/1234567890),".5 millimeter");
    }

    public function testFormatDisk(): void
    {
        $si=new SiFormat(false,"B",1024);
        $this->assertEquals("1B",$si->format("1"),"1 byte");
        $this->assertEquals("8KB",$si->format(8196),"8196 bytes");
        $this->assertEquals("1.15GB",$si->format(1234567890),"1234567890 bytes");
        $this->assertEquals("8.88PB",$si->format(9999999999999999),"9999999999999999 bytes");
    }

    public function testFormatWeight(): void
    {
        $si=new SiFormat(false,"g");
        $this->assertEquals("1Kg",$si->format("1000"),"1 Kg");
        $this->assertEquals("12.35Mg",$si->format("12345678"),"8000 bytes");
    }
}
