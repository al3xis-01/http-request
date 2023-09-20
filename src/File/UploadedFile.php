<?php

namespace Yolanda\Http\Request\File;

class UploadedFile extends File
{
    public function __construct(string $path, string $originalName, string $type = null, int $error = null)
    {
        $this->originalName = $this->getName($originalName);
        $this->type = $type ?: 'application/octet-stream';
        $this->error = $error ?: \UPLOAD_ERR_OK;


        parent::__construct($path);
    }
}