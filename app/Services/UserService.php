<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

use App\Services\ValidatorInterface;

use App\Models\User;

use Hash;

class UserService implements ValidatorInterface
{
	protected $tableHeaders = ['first', 'last', 'display', 'email', 'role', 'password'];
    protected $listHeaders = ['first', 'last', 'display', 'email', 'projects', 'status'];

    public function hashPass($pass)
    {
    	return Hash::make($pass);
    }

    public function getTableHeaders()
    {
    	return $this->tableHeaders;
    }

    public function getListingHeaders()
    {
        return $this->listHeaders;
    }

    public function getAllUsers()
    {
    	return User::all();
    }

    public function getAvailableRoles()
    {
        return Role::all();
    }

    public function validateInput($input)
    {
        foreach ($this->tableHeaders as $key) {
            if( $input[$key] == "") {
                return false;
            } else if( $key == "password" && $input[$key] != "") {
                $input[$key] = $this->hashPass( $input[$key] );
            }
        }
        return $input;
    }

    public function createUser($input)
    {
        if( count( $this->validateInput($input) ) > 1 ) {
            return User::insert($input);
        }
        return null;
    }


}
