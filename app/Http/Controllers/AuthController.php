<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

	public function register() {
		if(Auth::check()){
			return redirect()->route('home');
		}
		return view('userRegister');
	}

	public function registerPost(Request $request) {
		$request->validate([
			'name'=> 'required',
			'email'=>'required|email|unique:users',
			'password'=>'required',
		]);

		$data['name'] = $request->name;
		$data['email'] = $request->email;
		$data['password'] = Hash::make($request->password);

		$user = User::create($data);

		if(!$user) {
			return response()->json([
			'status'=> 401,
			'message' => 'Invalid credentials',
			'redirect'=>'/user/register',
			]);
		}
			return response()->json([
				'status'=>200,
				'message'=>'User created successfully',
				'user'=>$user,
				'redirect'=>'/user/login',
			]);
	}
}
