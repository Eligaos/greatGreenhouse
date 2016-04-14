<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;


use App\Services\ValidatorInterface;
use Redirect;
use Hash;

class RegisterService implements ValidatorInterface
{

	public function registerAccount($input){  

		$passHashed = Hash::make($input['password']);

		
		$input['password'] = $passHashed;
		$user = User::insert($input);
		dd($user);  

		$user->save();
		return $user;
	}
}
