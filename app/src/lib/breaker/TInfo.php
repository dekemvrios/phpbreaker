<?php

namespace Solis\Breaker;

/**
 * TInfo
 * 
 */
class TInfo
{

    /**
     *
     * @var array
     */
    private $info;

    /**
     * 
     * @param array $info
     */
    public function __construct($info)
    {
        $this->setInfo($info);
    }

    /**
     * 
     * @param array $value
     */
    public function setInfo($value)
    {
        $this->info = $value;
    }

    /**
     * 
     * @return array
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * 
     * @param string $key
     * @param array|string|int $value
     */
    public function addInfoEntry($key, $value)
    {
        $this->info[$key] = $value;
    }

    /**
     * 
     * @param type $key
     * @return boolean
     */
    public function getInfoEntry($key)
    {
        if (!array_key_exists($key, $this->info)) {
            return false;
        }

        return $this->info[$key];
    }

    /**
     * 
     * @return string
     */
    public function toJson()
    {        
        return json_encode($this->getInfo(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

}
