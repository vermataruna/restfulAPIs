<?php

namespace App\Enums;


enum UserTypeEnum: int
{
    case ADMIN = 1;
    case REGULAR = 2;
    case VERIFIED = 3;
    case UNVERIFIED = 4;
}
