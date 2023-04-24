<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //   'email' => 'required',
        //   'password' => 'required',
        // ]);

        // if ($validator->fails())
        //   return $validator->errors();

        // $email = $request->input('email');
        // $user = User::where('email', $email)->first();
        // $hashedPassword = $user->password;
        // $plaintextPassword = $request->input('password');

        // if (Hash::make($plaintextPassword, $hashedPassword)) {
        // remember two requirements for a token format (like JWT)
        // must carry information about user
        // must be signed (so unauthorized actors cannot generate them)
        //   $token = generateToken($user); // our custom way to generate tokens
        //   return ['token' => $token];
        // } else {
        //   return response(['error' => 'Password is incorrect'], 400);
        // }

        $credentials = request(['email', 'password']);
        $token = auth()->attempt($credentials);

        if ($token) {
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['message' => 'Invalid credentials. Check your password or email.', 'errors' => []], 401);
        }
    }
}
