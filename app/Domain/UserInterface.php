<?php

namespace App\Domain;

use Illuminate\Support\Collection;

interface UserInterface
{
    // работа с ролями
    public function assignRole(...$roles);
    public function removeRole(...$roles);
    public function hasRole($roles, string $guard = null): bool;

    // работа с правами
    public function getPermissionsViaRoles(): Collection;
}
