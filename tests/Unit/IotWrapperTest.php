<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class IotWrapperTest extends TestCase
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

    public function testShouldDefineIotWrapperToBeUsed()
    {
        $iot = new \Iot\Wrapper\Wrapper();

        $has = false;
        foreach (stream_get_wrappers() as $wrapper) {
            if ($wrapper == 'iot') {
                $has = true;
                break;
            }
        }

        $this->assertTrue($has);
    }

    public function testShouldSendDataToIotDevice()
    {
        $resource = fopen('iot://' . $this->fakeUsbPath, 'r+');
        fwrite($resource, 'data to iot device');

        $this->assertTrue(is_resource($resource));
    }

    public function testShouldHandlerErrorWhenTheUsbIsNotAvailable()
    {
        $this->markTestSkipped('Check ');
        fopen('iot:///foo/bar/tty_fake_usb', 'r+');
    }

}