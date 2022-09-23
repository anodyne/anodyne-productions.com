<?php

namespace Domain\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        return view('users.index', [
            'users' => User::paginate(10),
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
}
