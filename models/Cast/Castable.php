<?php

namespace app\models\Cast;

interface Castable
{
    public function get(): array;
    public function set(string $cast): string;
    public function find(int $casts = 0);
}
