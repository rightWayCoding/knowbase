<?php

namespace App\Domain\Enum;

enum ArticleStatus
{
    case Created;
    case Published;
    case Hided;
    case Deleted;
}
