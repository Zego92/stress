<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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

    public function store(Request $request)
    {
        User::create([
            'fio' => $request->fio,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'gravatar' => $request->gravatar,
            'password' => Hash::make($request->password),
        ]);
    }

    public function show(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
