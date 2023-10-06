<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
	public function login() {
		if(Auth::check()){
			return redirect()->route('home');
		}
		return view('userLogin');
	}

	public function loginPost(Request $request) {
		$request->validate([
			'email'=>'required|email',
			'password'=>'required'
		]);

		if(Auth::attempt($request->only('email', 'password'))){
			$token = auth()->user()->createToken('authToken', ['server:action'])->plainTextToken;
			$user = Auth::user();

			return response()->json([
				'status'=>200,
				'token'=>$token,
				'message'=>'Login Success',
				'user'=>$user,
				'redirect'=>'/home',
			]);
		}
		return response()->json([
			'status'=> 401,
			'message' => 'Invalid credentials'
		]);
	 	}

	public function logout(Request $request) {
		$request->user()->currentAccessToken()->delete();
		return response()->json([
			'status'=>200,
			'message'=>'Token deleted'
		]);
	}
}
