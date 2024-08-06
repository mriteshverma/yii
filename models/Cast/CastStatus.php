<?php

namespace app\models\Cast;

class CastStatus extends Cast
{
    /**
     * Role array list
    */
    protected static $casts = [
        1 => 'active',
        2 => 'closed',
    ];
}
