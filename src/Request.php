<?php

namespace Yolanda\Http\Request;

class Request
{
    public const METHOD_HEAD = 'HEAD';
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_PATCH = 'PATCH';
    public const METHOD_DELETE = 'DELETE';
    public const METHOD_PURGE = 'PURGE';
    public const METHOD_OPTIONS = 'OPTIONS';


    public InputCollection $request;
    public InputCollection $query;
    public FileCollection $files;
    public InputCollection $cookies;
    public ServerCollection $server;

    protected string $requestUri;

    protected string $baseUrl;

    protected string $basePath;
    protected string $method;

    public function __construct(array $query = [], array $request = [], array $cookies = [], array $files = [], array $server = [])
    {
        $this->init($query, $request, $cookies, $files, $server);
    }


    public function init(array $query = [], array $request = [], array $cookies = [], array $files = [], array $server = []): void
    {
        $this->query    =   new InputCollection($query);
        $this->request    =   new InputCollection($request);
        $this->files    =   new FileCollection($files);
        $this->cookies  =   new InputCollection($cookies);
        $this->server  =   new ServerCollection($server);

    }

    public static function createFromGlobals(): self
    {
        return new self($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }


}