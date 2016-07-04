<?php

namespace App\Http\Controllers;

use DebugBar\DebugBar;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\ClientRegistrationRequest;

use App\User;

use App\Services\UserService;
use Redirect;
use Session;
use Auth;
use Symfony\Component\Debug\Debug;

class GuestController extends Controller
{

    protected $uService;

    public function __construct(UserService $uService)
    {
        $this->uService = $uService;
    }

    public function login()
    {
        if(Auth::check()){

            return Redirect::to('/admin/exploracoes/listar');
        }

        return view('auth.login');
    }

    public function auth()
    {

        $input = Input::except('_token');
        $user = User::where('name', '=', $input['nome'])->first();
        if($user){

            if (Auth::attempt(['email' => $user->email, 'password' => $input['palavra-passe']])) {
                return Redirect::to('/admin/exploracoes/listar');
            }
        }

        Session::flash('errors', array('Utilizador não encontrado/password inválida'));

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(ClientRegistrationRequest $request)
    {
        $input = Input::except('_token');
        $input['password'] = $this->uService->hashPass($input['password']);
        $user = User::create($input);
        if(trim($input['cellphone']) != ""){
            $user->cellphone = $input['cellphone'];
            $user->save();

        }
        if(is_object($user)) {
            Auth::login($user);

            return Redirect::to('/admin/exploracoes/listar');
        }
        return Redirect::to('/register');
    }

    public function recovery()
    {
        return "recovering...";
    }


}