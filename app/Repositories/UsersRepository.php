<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class UsersRepository
{
    public function list(): Collection
    {
        return User::all();
    }

    public function generateToken(int $id): array
    {
        $user = User::find($id);
        $token = $user->createToken('auth-user-id' . $id);

        return ['token' => $token->plainTextToken];
    }
}
