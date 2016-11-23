<?php

namespace App\Http\Controllers\Auth;

use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repo\UserRepository;
use Auth;
use Session;

class AuthController extends Controller
{
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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/shop';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  App\Http\Requests\LoginRequest  $request
     * @param  Guard  $auth
     * @return Response
     */
    public function postLogin(
        LoginRequest $request,
        Guard $auth)
    {
        $logValue = $request->input('log');

        $logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $throttles = in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            flash()->error('Error', 'You have reached the maximum number of login attempts. Try again in one minute.');
            return redirect()->route('user.login')
                ->withInput($request->only('log'));
        }

        $credentials = [
            $logAccess  => $logValue, 
            'password'  => $request->input('password')
        ];

        if(!$auth->validate($credentials)) {
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }
            flash()->error('Error', 'These credentials do not match our records.');
            return redirect()->route('user.login')
                ->withInput($request->only('log'));
        }
            
        $user = $auth->getLastAttempted();

        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        $auth->login($user, $request->has('memory'));

        if($request->session()->has('user_id')) {
            $request->session()->forget('user_id');
        }
        if(Session::has('oldUrl')){
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }
        flash()->success('Success', 'Welcome to JUKO Shop!');  
        if(session('status') === 'admin') {   
            return redirect()->route('product.index');
        }
        else {
            return redirect()->route('user.profile');
        }
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  App\Http\Requests\RegisterRequest  $request
     * @param  App\Repositories\UserRepository $user_gestion
     * @return Response
     */
    public function postRegister(
        RegisterRequest $request,
        UserRepository $user_gestion)
    {
        $user = $user_gestion->store(
            $request->all()
        );
        Auth::login($user);

        if(Session::has('oldUrl')){
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }
        flash()->success('Success', 'Thanks for signing up!');
        return redirect()->route('user.profile');
    }

    /**
     * Handle a confirmation request.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @param  string  $confirmation_code
     * @return Response
     */
    public function getConfirm(
        UserRepository $user_gestion,
        $confirmation_code)
    {
        $user = $user_gestion->confirm($confirmation_code);
        flash()->success('Success', 'You have successfully verified your account! You can now login.');

        return redirect('/shop');
    }

    /**
     * Handle a resend request.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function getResend(
        UserRepository $user_gestion,
        Request $request)
    {
        if($request->session()->has('user_id')) {
            $user = $user_gestion->getById($request->session()->get('user_id'));

            $this->dispatch(new SendMail($user));

            flash()->success('Success', 'A confirmation message has been sent. Please check your email.');
            return redirect('/shop');
        }

        return redirect('/shop');        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|max:255',
    //         'email' => 'required|email|max:255|unique:users',
    //         'password' => 'required|min:6|confirmed',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }
}
