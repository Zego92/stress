<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index')
            ->with('users', $users);
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::create($request->all());
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(User $user)
    {
        return view('admin.users.show')
            ->with('user', $user);
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
//        $user->update([
//            'fio' => $request->input('fio'),
//            'username' => $request->input('username'),
//            'email' => $request->input('email'),
//            'phone' => $request->input('phone'),
//            'password' => Hash::make($request->input('password')),
//        ]);
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'Данные успешно обновлены');
    }

    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
