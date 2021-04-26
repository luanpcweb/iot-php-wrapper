<?php

require_once __DIR__ . '/../vendor/autoload.php';

$arduino = new \Iot\Wrapper\Wrapper();
$writer = new \Iot\Wrapper\Reader($arduino);
while (true) {
    print $writer->from('/dev/cu.usbmodem14101');
}