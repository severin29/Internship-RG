<?php

namespace App\Enum;

enum OrderStatus: string
{
    case Pending = 'Pending';
    case Completed = 'Completed';
    case Cancelled = 'Cancelled';
}
