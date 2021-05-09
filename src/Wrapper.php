<?php

namespace Iot\Wrapper;

class Wrapper
{
    private static $wrapperName = 'iot';
    private $path;

    public function __construct()
    {
        self::register();
    }

    public function stream_open($path, $mode, $options = null, &$opened_path = null )
    {
        $realPath = str_replace('iot://', '', $path);
        $this->path = fopen($realPath, 'r+');

        return true;
    }

    public function stream_read($count)
    {
        return fgets($this->path, $count);
    }

    public function stream_write($data)
    {
        sleep(2);
        return fwrite($this->path, $data);
    }

    public function stream_eof()
    {
        return fclose($this->path);
    }

    public function register()
    {
        foreach(stream_get_wrappers() as $wrapper) {
            if ($wrapper == self::$wrapperName) {
                return false;
            }
        }

        stream_wrapper_register(self::$wrapperName, self::class);
    }

}