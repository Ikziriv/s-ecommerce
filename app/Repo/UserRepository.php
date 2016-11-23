<?php

namespace App\Repo;

use App\Models\User;
use App\Models\Role;

class UserRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Models\Role
	 */	
	protected $role;

	/**
	 * Create a new UserRepository instance.
	 *
   	 * @param  App\Models\User $user
	 * @param  App\Models\Role $role
	 * @return void
	 */
	public function __construct(
		User $user, 
		Role $role)
	{
		$this->model = $user;
		$this->role = $role;
	}

	/**
	 * Save the User.
	 *
	 * @param  App\Models\User $user
	 * @param  Array  $inputs
	 * @return void
	 */
  	private function save($user, $inputs)
	{		

		$user->username = $inputs['username'];
		$user->email = $inputs['email'];

		if(isset($inputs['role'])) {
			$user->role_id = $inputs['role'];	
		} else {
			$role_user = $this->role->where('slug', 'customer')->first();
			$user->role_id = $role_user->id;
		}

		$user->save();
	}

	/**
	 * Get users collection paginate.
	 *
	 * @param  int  $n
	 * @param  string  $role
	 * @return Illuminate\Support\Collection
	 */
	public function index($n, $role)
	{
		if($role != 'total')
		{
			return $this->model
			->with('role')
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})		
			->oldest('seen')
			->latest()
			->paginate($n);			
		}

		return $this->model
		->with('role')		
		->oldest('seen')
		->latest()
		->paginate($n);
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function count($role = null)
	{
		if($role)
		{
			return $this->model
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})->count();			
		}

		return $this->model->count();
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function counts()
	{
		$counts = [
			'admin' => $this->count('admin'),
			'customer' => $this->count('customer')
		];

		$counts['total'] = array_sum($counts);

		return $counts;
	}

	/**
	 * Create a user.
	 *
	 * @param  array  $inputs
	 * @param  int    $confirmation_code
	 * @return App\Models\User 
	 */
	public function store($inputs)
	{
		$user = new $this->model;

		$user->username = ucfirst($inputs['username']);
		$user->password = bcrypt($inputs['password']);

		$this->save($user, $inputs);

		return $user;
	}

	/**
	 * Update a user.
	 *
	 * @param  array  $inputs
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function update($inputs, $user)
	{		
		$this->save($user, $inputs);
	}

	/**
	 * Get statut of authenticated user.
	 *
	 * @return string
	 */
	public function getStatus()
	{
		return session('status');
	}

	/**
	 * Valid user.
	 *
     * @param  bool  $valid
     * @param  int   $id
	 * @return void
	 */
	public function valid($valid, $id)
	{
		$user = $this->getById($id);

		$user->valid = $valid == 'true';

		$user->save();
	}

	/**
	 * Destroy a user.
	 *
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function destroyUser(User $user)
	{
		$user->delete();
	}

}
