<?php

namespace App\Domain\Contracts;

use App\Domain\DTO;
use Illuminate\Support\Collection;

interface DatabaseInterface
{
    public function create(DTO $data): int;
    public function read(int $id): DTO;
    public function updateById(int $id, array $data): int;
    public function delete(array $where): int;
    public function find(array $where): Collection;
}
