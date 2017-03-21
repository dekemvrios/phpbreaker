<?php

namespace Solis\Breaker;

use Solis\Breaker\TInfo;

class TinfoFactory
{

    /**
     * 
     * @param array $info
     * @return TInfo
     */
    public static function build($info)
    {
        if (is_array($info)) {
            return new TInfo($info);
        }

        return TInfo();
    }

}
