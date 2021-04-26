<?php

namespace Iot\Wrapper;

class Writer
{
    private $wrappers;

    public function __construct($wrapper)
    {
        $this->wrappers = $wrapper;
    }

    public function out($to, $data)
    {
        $this->wrappers->stream_open($to, 'r+');
        $bytes = $this->wrappers->stream_write($data);

        return ($bytes != 0);
    }

}