<?php

namespace Iot\Wrapper\Test\Unit;

class WriterTest extends \IotTestCase
{
    public function testShouldWriteToIotDeviceUsingOOPStyle()
    {
        $writer = new \Iot\Wrapper\Writer(new \Iot\Wrapper\Wrapper());
        $bytes = $writer->out($this->fakeUsbPath, 'from oop');

        $this->assertNotEmpty($bytes);
    }
}