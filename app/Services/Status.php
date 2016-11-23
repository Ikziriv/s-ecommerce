<?php namespace App\Services;

class Status  {

	/**
	 * Set the login user status
	 * 
	 * @param  Illuminate\Auth\Events\Login $login
	 * @return void
	 */
	public function setLoginstatus($login)
	{
		session()->put('status', $login->user->role->slug);
	}

	/**
	 * Set the visitor user status
	 * 
	 * @return void
	 */
	public function setVisitorstatus()
	{
		session()->put('status', 'visitor');
	}

	/**
	 * Set the status
	 * 
	 * @return void
	 */
	public function setstatus()
	{
		if(!session()->has('status')) 
		{
			session()->put('status', auth()->check() ?  auth()->user()->role->slug : 'visitor');
		}
	}

}