<?php

namespace Solis\Breaker\Contracts;

/**
 * Class TInfoContract
 *
 * @package Solis\Breaker\Contracts
 */
interface TInfoContract
{
    /**
     * setInfo
     *
     * @param array $value
     */
    public function setInfo($value);

    /**
     * getInfo
     *
     * @return array
     */
    public function getInfo();

    /**
     * addEntry
     *
     * @param string  $key
     * @param mixed   $value
     *
     * @return boolean
     */
    public function addEntry($key, $value);

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return bool
     */
    public function setEntry($key, $value);

    /**
     * getEntry
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getEntry($key);

    /**
     * removeEntry
     *
     * @param string $key
     *
     * @return boolean
     */
    public function removeEntry($key);

    /**
     * toJson
     *
     * @return string
     */
    public function toJson();

    /**
     * toArray
     *
     * @return array
     */
    public function toArray();
}
