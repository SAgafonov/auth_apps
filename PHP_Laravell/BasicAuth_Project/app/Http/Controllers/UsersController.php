<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class UsersController extends Controller
{
	public function submit(Request $req) {
		$validation = $req->validate([
			'name' => 'required|min:1|max:30',
			'passwd' => 'required|min:1|max:30',
			'role' => 'min:4|max:5'
		]);
		//$user = new UserModel();
		$username = $req->input('name');
		$userExists = $this->userExists($username);
		if ($userExists) {
			return Redirect::back()->withErrors(['error', 'User exists: '.$username]);
		}

		$user = new UserModel();
		$user->name = $username;
		
		$hash = Hash::make($req->input('passwd', ['rounds' => 12,]));
		$user->password = $hash;
		
		$role = $req->input('role');
		if ($role == 'admin') {
			$user->role = 1;
		}
		else {
			$user->role = 0;
		}

		$user->save();

		return redirect()->route('auth-form')->with('status', 'You are registered.');
	}
	
	public function userExists($username) {
		$user = DB::select('select name FROM user_models where name = ?', [$username]);
		return $user;
	}
}
