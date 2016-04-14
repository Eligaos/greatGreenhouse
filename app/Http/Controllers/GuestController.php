<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\ClientRegistrationRequest;

use App\Models\User;

use App\Services\UserService;


use Redirect;
use Session;
use Auth;

class GuestController extends Controller
{

    protected $uService;

    public function __construct(UserService $uService)
    {
        $this->uService = $uService;
    }

    public function login()
    {
    	return view('auth.login');
    }

    public function cardinal($action)
    {
    	switch ($action) {
    		case 'recovery':
            return $this->recovery();    		
            case 'register':
            return $this->register();
            case 'authentication':
            return $this->auth();
            case 'login':
            return $this->login();
        }
    }

    public function auth()
    {
        $input = Input::except('_token');
        $user = User::where('display', '=', $input['display'])->first();

        if( is_object($user) && $user->isActive() ) {

            if (Auth::attempt(['email' => $user->email, 'password' => $input['pass']])) {
                return Redirect::to('/admin');
            }
        }

            //Session::flash('error', 'Your account have not yet been activated. Please wait 24h for the admin to check it out.');
        return Redirect::to('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(ClientRegistrationRequest $request)
    {   
        $input = Input::except('_token', 'password_confirmation');
       
        $input['password'] = $this->uService->hashPass($input['password']);
        $user = User::create($input);
        $user->save();

        if(is_object($user)) {
            Auth::login($user);

            return Redirect::to('/home');
        }

        return Redirect::to('/register');     
    }

    public function recovery()
    {
       return "recovering...";
   }


}