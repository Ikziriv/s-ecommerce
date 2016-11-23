<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role; 
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Role::create([
			'title' => 'Administrator',
			'slug' => 'admin'
		]);

		Role::create([
			'title' => 'Customer',
			'slug' => 'customer'
		]);
    }
}
