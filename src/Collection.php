<?php

namespace Yolanda\Http\Request;

use Traversable;

class Collection implements \IteratorAggregate, \Countable
{
    private array $inputs;

    public function __construct(array $inputs = [])
    {
        $this->inputs   =   $inputs;
    }

    public function all(string $key = null): array
    {
        if (null === $key) {
            return $this->inputs;
        }

        if (!array_key_exists($key, $this->inputs)){
            return [];
        }

        return $this->inputs[$key];
    }

    /**
     * Returns the parameter keys.
     */
    public function keys(): array
    {
        return array_keys($this->inputs);
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->inputs);
    }
    public function set(string $key, mixed $value): self
    {
        $this->inputs[$key] =   $value;
        return $this;
    }

    public function remove(string $key): self
    {
        unset($this->inputs[$key]);
        return $this;
    }

    public function count(): int
    {
        return count($this->inputs);
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->inputs);
    }
}