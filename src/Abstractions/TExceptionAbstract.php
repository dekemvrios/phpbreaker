<?php

namespace Solis\Breaker\Abstractions;

use Solis\Breaker\Contracts\TInfoContract;

/**
 * TException
 * 
 * @package Solis\Breaker\TException
 */
abstract class TExceptionAbstract extends \Exception
{

    /**
     * Contains default information about the exception
     * 
     * @var TInfoContract
     */
    protected $error;

    /**
     * Contains information about the exception displayed in debug mode
     * 
     * @var TInfoContract
     */
    protected $debug;

    /**
     * TExceptionAbstract constructor.
     *
     * @param TInfoContract $error
     * @param TInfoContract $debug
     */
    public function __construct($error, $debug)
    {
        parent::__construct('exception owner ' . __CLASS__);

        // create new Tinfo object to store default TException information                
        $this->error = $error;

        // create new Tinfo object to store debug TException information
        $this->debug = $debug;
    }

    /**
     * getError
     * 
     * Return the default information about the throwed TException
     * 
     * @return TInfoContract
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * getDebug
     * 
     * Return the Debug information about the throwed TException
     * 
     * @return TInfoContract
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * toArray
     * 
     * Return default and debug information about the throwed TException
     * 
     * @return array
     */
    public function toArray()
    {
        return [
            "error" => $this->getError()->toArray(),
            "debug" => $this->getDebug()->toArray()
        ];
    }

    /**
     * toJson
     * 
     * Return a json representation of the default and debug information about the throwed TException
     * 
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * getTTrace
     * 
     * Return the TException stack trace as an array
     * 
     * @param array $info keys used to filter the trace
     *
     * @return array
     */
    protected function getTTrace($info = null)
    {
        if (!empty($info)) {
            return array_map(function($item) use ($info) {
                return $this->filterArrayKeys($item, $info);
            }, $this->getTrace());
        }

        return $this->getTrace();
    }

    /**
     * filterArrayKeys
     * 
     * remove array keys that are not specified in $data
     * 
     * @param array $array
     * @param array $data
     * @return array
     */
    protected function filterArrayKeys($array, $data)
    {
        foreach (array_keys($array) as $key) {
            if (!in_array($key, $data)) {
                unset($array[$key]);
            }
        }

        return $array;
    }
}

