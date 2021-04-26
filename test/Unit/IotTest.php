<?php
namespace Iot\Wrapper\Test\Unit;

class IotTest extends \IotTestCase
{
    public function testShouldDefineIotWrapperToBeUsed()
    {
        $iot = new \Iot\Wrapper\Wrapper();

        $has = false;
        foreach (stream_get_wrappers() as $wrapper) {
            if ($wrapper == 'arduino') {
                $has = true;
                break;
            }
        }

        $this->assertTrue($has);
    }

    public function testShouldSendDataToIotDevice()
    {
        $resource = fopen('arduino://' . $this->fakeUsbPath, 'r+');
        fwrite($resource, 'data to iot device');

        $this->assertTrue(is_resource($resource));
    }

    public function testShouldHandlerErrorWhenTheUsbIsNotAvailable()
    {
        $this->markTestSkipped('Check ');
        fopen('arduino:///foo/bar/tty_fake_usb', 'r+');
    }

}