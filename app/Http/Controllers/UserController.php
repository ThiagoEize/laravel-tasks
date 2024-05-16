<?php

namespace App\Http\Controllers;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UsersRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list()
    {
        $users = $this->userRepository->list();

        return response()->json(
            $users,
            200
        );
    }

    public function generateToken(Request $request)
    {
        $id = $request->get('id');
        $token = $this->userRepository->generateToken($id);

        return response()->json(
            $token,
            200
        );
    }
}
