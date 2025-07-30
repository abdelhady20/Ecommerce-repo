<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::latest()->get();
    }

    public function find($id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function update($id, array $data): bool
    {
        $user = User::findOrFail($id);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        return $user->update($data);
    }

    public function delete($id): bool
    {
        return User::destroy($id);
    }
}
