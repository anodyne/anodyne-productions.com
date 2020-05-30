<?php

namespace App\Admin\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Domain\Account\Models\User;
use Support\Controllers\Controller;
use Domain\Account\Actions\CreateUser;
use Domain\Account\Actions\DeleteUser;
use Domain\Account\Actions\UpdateUser;
use App\Admin\Requests\StoreUserRequest;
use Domain\Account\Presenters\UserPresenter;
use Domain\Account\DataTransferObjects\UserData;
use App\Account\Requests\UpdateAccountInfoRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(Request $request)
    {
        $users = User::orderBy('username')
            ->filter($request->only('search'))
            ->paginate(15);

        return Inertia::render('Admin/Users/Index', [
            'filters' => $request->all('search'),
            'users' => UserPresenter::paginator($users)->paginate(),
        ]);
    }

    public function show(User $user)
    {
        return Inertia::render('Admin/Users/View', [
            'user' => UserPresenter::make($user)->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Users/Create');
    }

    public function store(StoreUserRequest $request, CreateUser $action)
    {
        $action->execute(UserData::fromRequest($request));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return Inertia::render('Admin/Users/Edit', [
            'user' => UserPresenter::make($user)->get(),
        ]);
    }

    public function update(UpdateAccountInfoRequest $request, UpdateUser $action, User $user)
    {
        $action->execute($user, UserData::fromRequest($request));

        return back();
    }

    public function destroy(DeleteUser $action, User $user)
    {
        $action->execute($user);

        return redirect()->route('admin.users.index');
    }
}
