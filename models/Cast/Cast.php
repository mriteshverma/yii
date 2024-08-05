<?php

namespace app\models\Cast;

abstract class Cast implements Castable
{
    protected static $casts;

    /**
     * Get all cast items.
     * @return array
     */
    public function get(): array
    {
        return static::$casts;
    }

    /**
     * Get all cast items.
     * @return array
     */
    public function keys(): array
    {
        return array_keys(static::$casts);
    }


    /**
     * Exclude cast item while create update delete.
     * @param $item <array|string>
     * @return object
     */
    public function exclude(array|string $item): object
    {
        if (!is_array($item)) {
            $item = [$item];
        }
        static::$casts = array_diff(static::$casts, $item);
        return $this;
    }


    /**
     * Set cast item while create update delete.
     * @param $cast string
     * @return string
     */
    public function set(string $cast): string
    {
        $arr = static::$casts;
        return isset($arr[$cast]) ? $arr[$cast] : '';
    }


    /**
     * Find cast item.
     * @param $cast integer
     * @param return
     */
    public function find(int $cast = 0): string
    {
        return isset(static::$casts[$cast]) ? static::$casts[$cast] : '';
    }
}
