<?php

namespace App\Enums;

enum TaskStatusEnum:string {

    case NotStart = 'not_start';

    case Pending = 'pending';

    case Completed = 'completed';

}