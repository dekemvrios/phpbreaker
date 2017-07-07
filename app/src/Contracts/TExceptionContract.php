<?php

namespace Solis\Breaker\Contracts;

/**
 * Interface TExceptionContract
 *
 * @package Solis\Breaker\Contracts
 */
interface TExceptionContract
{
    /**
     * getError
     *
     * Return the default information about the TException
     *
     * @return TInfoContract
     */
    public function getError();

    /**
     * getDebug
     *
     * Return the Debug information about the TException
     *
     * @return TInfoContract
     */
    public function getDebug();

    /**
     * toArray
     *
     * Return default and debug information about the TException
     *
     * @return array
     */
    public function toArray();

    /**
     * toJson
     *
     * Return a json representation of the default and debug information about the TException
     *
     * @return string
     */
    public function toJson();
}
