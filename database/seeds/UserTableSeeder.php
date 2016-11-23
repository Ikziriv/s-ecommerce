<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role; 
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		User::create([
			'username' => 'GreatAdmin',
			'email' => 'admin@gmail.com',
			'password' => bcrypt('admin'),
			'role_id' => 1
		]);

		User::create([
			'username' => 'Customer',
			'email' => 'customer@gmail.com',
			'password' => bcrypt('customer'),
			'role_id' => 2
		]);
    }
}
