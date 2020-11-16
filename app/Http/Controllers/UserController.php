<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return response()->json(['data' => $users], 200);
    }

    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return response()->json(['data' => $user], 200);
    }

    public function store(UserRequest $request)
    {

    }
}
