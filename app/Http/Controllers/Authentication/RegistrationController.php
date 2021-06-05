<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        // Validate
        $this->validate(
            $request,
            [
                'email' => 'required|unique:users|email:rfc,dns',
                'first_name' => 'required',
                'last_name' => 'required',
                'password' => 'required'
            ]
        );
        // Save to database
        //Rederect
        dd('aa');
    }
}
