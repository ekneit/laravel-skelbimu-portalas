<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('autentication.registration');
    }

    /**
     * @throws ValidationException
     */
    public function save(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|unique:users|email:rfc,dns',
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'password' => [
                    'required',
                    'confirmed',
                    Password::min(8)->mixedCase()->letters()->numbers()->symbols()
                ],
            ]
        );
        User::create([
            'email' => $request['email'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'password' => Hash::make($request['password'])
        ]);
        auth()->attempt($request->only('email','password'));
        return redirect()->route('dashboard');
    }
}
