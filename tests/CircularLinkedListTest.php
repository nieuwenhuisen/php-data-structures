<?php

namespace App\Tests;

use App\LinkedList\CircularLinkedList;
use PHPUnit\Framework\TestCase;

class CircularLinkedListTest extends TestCase
{
    private $linkedList;

    public function setUp(): void
    {
        $this->linkedList = new CircularLinkedList();
    }
}
