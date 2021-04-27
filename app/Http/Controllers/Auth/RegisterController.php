<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'fio' => $data['fio'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gravatar' => $data['gravatar'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Logout and redirect registered user to login page.
     */
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect()->route('login');
    }

}
