<?php

namespace App\Repositories;

use App\Models\User;

final class UsersRepository
{
    public function list()
    {
        return User::all();
    }

    public function generateToken(int $id)
    {
        $user = \App\Models\User::find($id);
        $token = $user->createToken('user-auth-token');

        return ['token' => $token->plainTextToken];
    }
}
