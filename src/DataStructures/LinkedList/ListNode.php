<?php

declare(strict_types=1);

namespace App\DataStructures\LinkedList;

class ListNode
{
    /** @var mixed */
    public $data;

    /** @var int|null */
    public $priority;

    /** @var ListNode|null */
    public $next;

    /** @var ListNode|null */
    public $previous;

    public function __construct($data = null, int $priority = null)
    {
        $this->data = $data;
        $this->priority = $priority;
    }
}
