<?php

namespace Solis\Breaker;

use Solis\Breaker\TInfo;

/**
 * TException
 * 
 * @package Solis\Breaker\TException
 */
class TException extends \Exception
{

    /**
     * Contains default information about the throwed exception
     * 
     * @var TInfo
     */
    private $error;

    /**
     * Contains information about the throwed exception displayed in debug mode
     * 
     * @var TInfo
     */
    private $debug;

    /**
     * __construct
     * 
     * @param mixed $class class name
     * @param mixed $method method name
     * @param mixed $reason explanation for TException
     * @param mixed $code error code
     */
    public function __construct($class, $method, $reason, $code)
    {
        parent::__construct('');

        // create new Tinfo object to store default TException information                
        $this->error = Tinfo::build([
                    'code' => $code, 'message' => $reason
        ]);

        // create new Tinfo object to store debug TException information
        $this->debug = Tinfo::build([
                    'class' => $class, 'method' => $method, 'trace' => $this->getTrace()
        ]);
    }

    /**
     * getError
     * 
     * Return the default information about the throwed TException
     * 
     * @return TInfo
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
     * @return TInfo
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
     */
    public function getTTrace($info = null)
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
    private function filterArrayKeys($array, $data)
    {
        foreach (array_keys($array) as $key) {
            if (!in_array($key, $data)) {
                unset($array[$key]);
            }
        }

        return $array;
    }

}
