<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class WriterWrapperTest extends TestCase
{
    protected $fakeIotDeviceUsbResource;
    protected $fakeUsbPath = 'ttyUSB0_fake';

    public function setUp()
    {
        $this->fakeIotDeviceUsbResource = fopen($this->fakeUsbPath, 'w');
    }

    public function tearDown()
    {
        fclose($this->fakeIotDeviceUsbResource);
        unlink($this->fakeUsbPath);
    }

    public function testShouldWriteToIotDeviceUsingOOPStyle()
    {
        $writer = new \Iot\Wrapper\Writer(new \Iot\Wrapper\Wrapper());
        $bytes = $writer->out($this->fakeUsbPath, 'from oop');

        $this->assertNotEmpty($bytes);
    }
}