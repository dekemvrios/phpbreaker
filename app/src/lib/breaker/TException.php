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
     * @param string $class
     * @param string $method
     * @param string|array $reason
     * @param string|int $code
     */
    public function __construct($class, $method, $reason, $code)
    {
        // é necessário chamar o construtor da classe parent para o correto funcionamento da classe
        parent::__construct('');
        
        // create new Tinfo object to store error information
        $this->error = new TInfo([]);
        $this->getError()->addInfoEntry('code', $code);
        $this->getError()->addInfoEntry('message', $reason);

        // create new Tinfo object to store debug information
        $this->debug = new TInfo([]);
        $this->getDebug()->addInfoEntry('class', $class);
        $this->getDebug()->addInfoEntry('method', $method);
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
     * getThinTrace
     * 
     * @param array $info
     */
    public function getThinTrace($info = null)
    {
        if (!empty($info)) {
            return array_map(function($item) use ($info) {
                $item = $this->unsetArrayByData($item, $info);

                if (!empty($item)) {
                    return $item;
                }
            }, $this->getTrace());
        }

        return $this->getTrace();
    }

    /**
     * unsetArrayByData
     * 
     * @param array $arrayItem
     * @param array $data
     * @return array
     */
    private function unsetArrayByData($arrayItem, $data)
    {
        foreach (array_keys($arrayItem) as $key) {
            if (!in_array($key, $data)) {
                unset($arrayItem[$key]);
            }
        }

        return $arrayItem;
    }

}
