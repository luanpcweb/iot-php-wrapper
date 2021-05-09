<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class IotTestCase extends TestCase
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

}