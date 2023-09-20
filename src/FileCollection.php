<?php

namespace Yolanda\Http\Request;

use Yolanda\Http\Request\File\File;
use Yolanda\Http\Request\File\UploadedFile;

class FileCollection extends Collection
{

    public function __construct(array $inputs = [])
    {
        parent::__construct();

        foreach ($inputs as $key => $value) {
            $this->inputs[$key] =   new UploadedFile($value['tmp_name'], $value['name'], $value['type'], $value['error']);
        }

    }

    public function get(string $key, mixed $default = null): ?File
    {
        if (!array_key_exists($key, $this->inputs)){
            return null;
        }
        return $this->inputs[$key];
    }
}