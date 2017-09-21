<?php

namespace Solis\Breaker\Tests\Fixtures\Dummy;

class DummyStack
{

    public function getStack()
    {
        return [
            [
                'class'    => 'class_3',
                'function' => 'function_3',
                'args'     => ['args_3'],
            ],
            [
                'class'    => 'class_2',
                'function' => 'function_2',
                'args'     => ['args_2'],
            ],
            [
                'class'    => 'class_1',
                'function' => 'function_1',
                'args'     => ['args_1'],
            ],
        ];
    }
}