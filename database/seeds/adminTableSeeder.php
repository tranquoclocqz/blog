<?php

use Illuminate\Database\Seeder;
use App\admin;

class adminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$admin = new admin();
		$admin->name = '';
		$admin->remember_token = '';
		$admin->email = 'tranquoclocnina@gmail.com';
		$admin->password = bcrypt('123456');
		$admin->save();
    }
}
