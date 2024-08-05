<?php

namespace app\models\Cast;

class CastRole extends Cast
{
    /**
     * Role array list
    */
    protected static $casts = [
        1 => 'admin',
        2 => 'manager',
        3 => 'user',
    ];
}
