<?php

namespace App\Stack;

interface StackInterface
{
    public function push(string $newItem) : void;
    public function pop();
    public function top();
    public function isEmpty() : bool;
}
