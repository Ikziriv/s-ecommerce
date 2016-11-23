<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(ChatterTableSeeder::class);
    }
}
