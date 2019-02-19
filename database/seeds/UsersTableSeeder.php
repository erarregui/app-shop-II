<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Eduardo2',
            'email' => 'earregui2@vilidad.com',
            'password' => bcrypt('123123')
        ]);
    }
}
