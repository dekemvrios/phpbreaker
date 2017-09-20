<?php

namespace Solis\Breaker\Helpful;

/**
 * Class AbstractDataContainer
 *
 * @package Solis\Breaker\Helpful
 */
abstract class AbstractDataContainer
{

    private $data = [];


    protected function __construct(array $info = [])
    {
        $this->setData($info);
    }

    public function setData(array $value)
    {
        $this->data = $value;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setEntry(
        string $key,
        $value
    ): AbstractDataContainer {
        $this->data[$key] = $value;

        return $this;
    }

    public function getEntry(string $key)
    {
        return $this->data[$key] ?? null;
    }

    public function toJson(): string
    {
        return json_encode($this->getData(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function toArray(): array
    {
        return $this->getData();
    }

    protected function getValueFromData(string $name)
    {
        $name = strtolower(str_replace('get', '', $name));

        return $this->getEntry($name);
    }

    protected function setValueInData(string $name, array $arguments)
    {
        $name = strtolower(str_replace('set', '', $name));

        return $this->setEntry($name, count($arguments) == 1 ? $arguments[0] : $arguments);
    }

    public function __call(
        $name,
        $arguments
    ) {
        if (preg_match(
            '/^get/',
            $name
        )) {
            return $this->getValueFromData($name);
        }

        if (preg_match(
            '/^set/',
            $name
        )) {
            return $this->setValueInData($name, $arguments);
        }

        return false;
    }
}
