<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function all();
    public function find($id): ?User;
    public function create(array $data): User;
    public function update($id, array $data): bool;
    public function delete($id): bool;
}
