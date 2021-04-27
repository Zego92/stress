<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'fio' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:50', 'unique:users'],
            'phone' => ['required', 'string', 'email', 'max:13', 'unique:users'],
            'gravatar' => ['string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Admin::create([
            'fio' => $data['fio'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gravatar' => $data['gravatar'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        if ($user){
            Auth::guard('admin')->login($user);
            return redirect()->intended(route('admin.index'));
        }
        return redirect()->back()->withInput($request->only('email'));
    }
}
