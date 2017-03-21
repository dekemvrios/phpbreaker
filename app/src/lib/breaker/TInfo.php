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
     * __construct
     * 
     * @param array $info
     */
    private function __construct($info = [])
    {
        $this->setInfo($info);
    }

    /**
     * build
     * 
     * Factory method
     * 
     * @param type $info
     * @return \static
     */
    public static function build($info = [])
    {
        if (!is_array($info)) {
            return new static();
        }

        return new static($info);
    }

    /**
     * setInfo
     * 
     * @param array $value
     */
    public function setInfo($value)
    {
        $this->info = $value;
    }

    /**
     * getInfo
     * 
     * @return array
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * addEntry
     * 
     * @param string $key
     * @param array|string|int $value
     */
    public function addEntry($key, $value)
    {
        $this->info[$key] = $value;
    }

    /**
     * getEntry
     * 
     * @param type $key
     * @return mixed
     */
    public function getEntry($key)
    {
        if (!array_key_exists($key, $this->info)) {
            return false;
        }

        return $this->info[$key];
    }

    /**
     * toJson
     * 
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->getInfo(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

}
