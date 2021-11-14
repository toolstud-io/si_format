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

    public function testFormatLong(): void
    {
        $si=new SiFormat(true,"meter",1000," ");
        $this->assertEquals("1 meter",$si->format(1),"1");
        $this->assertEquals("0.1 meter",$si->format(.1),"1");
        $this->assertEquals("10 millimeter",$si->format(.01),"1");
        $this->assertEquals("1 millimeter",$si->format(.001),"1");
        $this->assertEquals("1 Kilometer",$si->format(1000),"1 kilometer");
        $this->assertEquals("0.5 millimeter",$si->format(.0005),".5 millimeter");
        $this->assertEquals("0.81 nanometer",$si->format(1/1234567890),".5 millimeter");
    }

    public function testFormatDisk(): void
    {
        $si=new SiFormat(false,"B",1024);
        $this->assertEquals("1B",$si->format("1"),"1 byte");
        $this->assertEquals("8KB",$si->format(8196),"8196 bytes");
        $this->assertEquals("1.15GB",$si->format(1234567890),"1234567890 bytes");
        $this->assertEquals("8.88PB",$si->format(9999999999999999),"9999999999999999 bytes");
    }

    public function testFormatDiskSI(): void
    {
        $si=new SiFormat(false,"B");
        $this->assertEquals("1B",$si->format("1"),"1 byte");
        $this->assertEquals("8.2KB",$si->format(8196),"8196 bytes");
        $this->assertEquals("1.23GB",$si->format(1234567890),"1234567890 bytes");
        $this->assertEquals("10PB",$si->format(9999999999999999),"9999999999999999 bytes");
    }

    public function testFormatDiskLong(): void
    {
        $si=new SiFormat(true,"byte",1024," ");
        $this->assertEquals("8 Kibibyte",$si->format(8196),"8196 bytes");
        $this->assertEquals("1.15 Gibibyte",$si->format(1234567890),"1234567890 bytes");
        $this->assertEquals("8.88 Pibibyte",$si->format(9999999999999999),"9999999999999999 bytes");
    }

    public function testFormatWeight(): void
    {
        $si=new SiFormat(false,"g");
        $this->assertEquals("1Kg",$si->format("1000"),"1 Kg");
        $this->assertEquals("12.35Mg",$si->format("12345678"),"8000 bytes");
    }
}
