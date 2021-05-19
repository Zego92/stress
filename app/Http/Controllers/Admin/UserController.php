<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function store(Request $request): RedirectResponse
    {
        User::create($request->all());
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(User $user)
    {
        return view('admin.users.show')
            ->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'fio' => $request->input('fio'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);
    }

    public function destroy(User $user)
    {
        //
    }
}
