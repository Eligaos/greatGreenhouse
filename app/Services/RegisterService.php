<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Redirect;
use Hash;
class RegisterService
{

	public function registerAccount($input){  

		$passHashed = Hash::make($input['password']);
		$input['password'] = $passHashed;
		$user = User::create($input);
		$user->save();
		return $user;
	}
}
