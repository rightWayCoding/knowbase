<?php

namespace App;

use App\Domain\UserInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements UserInterface
{
    use HasRoles;
}
