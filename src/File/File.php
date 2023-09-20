<?php

namespace Yolanda\Http\Request\File;

use Yolanda\Http\Request\Exception\FileNotFoundException;

class File extends \SplFileInfo
{


    protected string $originalName;
    protected string $path;
    protected string $type;
    protected int $error;

    public function __construct(string $filename)
    {

        if (!is_file($filename)){
            throw new FileNotFoundException($filename);
        }

        parent::__construct($filename);
    }

    protected function getName(string $name): string
    {
        $originalName = str_replace('\\', '/', $name);
        $pos = strrpos($originalName, '/');
        $originalName = false === $pos ? $originalName : substr($originalName, $pos + 1);

        return $originalName;
    }

}