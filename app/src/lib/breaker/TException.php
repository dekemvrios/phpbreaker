<?php

namespace Solis\Breaker;

use Solis\Breaker\TInfo;

/**
 * TException
 * 
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
     * @param mixed $class
     * @param mixed $method
     * @param mixed $reason
     * @param mixed $code
     */
    public function __construct($class, $method, $reason, $code)
    {
        // é necessário chamar o construtor da classe parent para o correto funcionamento da classe
        parent::__construct('');

        // create new Tinfo object to store default error information                
        $this->error = TInfo::register([
                    'code' => $code, 'message' => $reason
        ]);

        // create new Tinfo object to store debug error information
        $this->debug = TInfo::register([
                    'class' => $class, 'method' => $method
        ]);
    }

    /**
     * getError
     * 
     * Return the default information about the throwed exception
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
     * Return the Debug information about the throwed exception
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
     * @return array
     */
    public function toArray()
    {
        return [
            "error" => $this->getError()->getInfo(),
            "debug" => $this->getDebug()->getInfo()
        ];
    }

    /**
     * toJson
     * 
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * getThinTrace
     * 
     * @param array $info
     */
    public function getThinTrace($info = null)
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
     * @param array $arrayItem
     * @param array $data
     * @return array
     */
    private function filterArrayKeys($arrayItem, $data)
    {
        foreach (array_keys($arrayItem) as $key) {
            if (!in_array($key, $data)) {
                unset($arrayItem[$key]);
            }
        }

        return $arrayItem;
    }

}
