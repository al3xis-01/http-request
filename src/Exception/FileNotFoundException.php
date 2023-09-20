<?php

namespace Yolanda\Http\Request\Exception;

class FileNotFoundException extends \RuntimeException
{
    public function __construct(string $path = "")
    {
        parent::__construct(sprintf('The file "%s" does not exist', $path));
    }
}