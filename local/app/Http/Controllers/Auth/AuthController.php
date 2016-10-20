<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input; 
use Illuminate\Support\Facades\Validator; 
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

class AuthController extends Controller {


	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;


	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLogin()
	{
		header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		return view('login');
	}

	
	public function postLogin(Request $request){

		header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');

	    if (Auth::attempt(['usuario' => $request->username,'password' => $request->password,], $request->has('remember'))){
	        return redirect()->intended($this->redirectPath());
	    }
	    else{
	        $rules = [
	            'username' => 'required',
	            'password' => 'required',
	        ];
	        
	        $messages = [
	            'username.required' => 'El campo usuario es requerido',
	            'password.required' => 'El campo contraseña es requerido',
	        ];
	        
	        $validator = Validator::make($request->all(), $rules, $messages);
	        
	        return redirect('login')
	        ->withErrors($validator)
	        ->withInput()
	        ->with('mensaje', 'Tus datos son incorrectos.');
	    }
	}

	public function getLogout() {
    	Auth::logout();
    	return Redirect::to('/login')->with('mensaje', 'Tu sesión ha sido cerrada.');
	}


}
