<?php

namespace App\Domain\Contracts;

use Illuminate\Support\Collection;

interface UserInterface
{
    // работа с ролями
    public function assignRole(Collection $roles);
    public function removeRole(Collection $roles);
    public function hasRole(Collection $roles, string $guard = null): bool;

    // работа с правами
    public function getPermissionsViaRoles(): Collection;
}
