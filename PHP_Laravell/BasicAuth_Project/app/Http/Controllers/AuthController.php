<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class AuthController extends Controller
{
	public function submit(Request $req)
	{
		$SECRET = "WerdfgG324dgdfg#@42ew@3";

		$validation = $req->validate([
                        'name' => 'required|min:1|max:30',
                        'passwd' => 'required|min:1|max:30',
                ]);
		
		$username = $req->input('name');
		$pwd = $req->input('passwd');
		$userExists = $this->userCheck($username, $pwd);
		if ($userExists !== 1) {
			return Redirect::back()->withErrors(['error', 'Incorrect username or password']);
		}
		else {
			$role = DB::table('user_models')->where('name', $username)->pluck('role')[0];
			if ($role === 1) {
				return redirect()->route('authorized')->with('secret', $SECRET);
			}
			else {
				return redirect()->route('authorized');
			}
		}
	}
	
	public function userCheck($username, $passwd) {
                $name = DB::table('user_models')->where('name', $username)->pluck('name');
		
		if ($name->count()) {
			$usr_passw = DB::table('user_models')->where('name', $username)->pluck('password')[0];
			
			if (Hash::check($passwd, $usr_passw)) {
				return 1;
			}
			else {
				return 0;
			}
		}
		return 0;
	}
}
