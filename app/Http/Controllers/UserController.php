<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Repo\UserRepository;
use App\Repo\RoleRepository;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Auth;

class UserController extends Controller
{
    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $user_gestion;

    /**
     * The RoleRepository instance.
     *
     * @var App\Repositories\RoleRepository
     */ 
    protected $role_gestion;
    /**
     * Create a new UserController instance.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @param  App\Repositories\RoleRepository $role_gestion
     * @return void
     */
    public function __construct(
        UserRepository $user_gestion,
        RoleRepository $role_gestion)
    {
        $this->user_gestion = $user_gestion;
        $this->role_gestion = $role_gestion;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $users = User::where('username', 'LIKE', '%'.$q.'%')
            ->orderBy('username')->paginate(7);
        return view('admin.pages.users.index', compact('users', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create', $this->role_gestion->getAllSelect());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->user_gestion->store($request->all());
        flash()->success('Success', 'User saved successfully');

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.pages.users.edit', array_merge(compact('user'), $this->role_gestion->getAllSelect()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        $this->user_gestion->update($request->all(), $user);

        flash()->success('Success', $user->username . ' updated successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->user_gestion->destroyUser($user);
        flash()->success('Success', 'User deleted successfully');
        return redirect()->route('user.index');
    }

    public function getSignup(){
		return view('auth.register');
	}

    public function getSignin(){
		return view('auth.login');
	}

	public function getProfile(){
        $purcashers = Auth::user()->purcashers;
        $purcashers->transform(function ($purcasher, $key) {
            $purcasher->cart = unserialize($purcasher->cart);
            return $purcasher;
        });
		return view('user.profile', ['purcashers' => $purcashers]);
        // return view('user.profile');
	}

    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.login');
    }
}
