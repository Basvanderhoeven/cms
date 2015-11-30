<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Hashing;
class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Administrator',
        'username' => 'admin',
        'email'    => 'admin@email.nl',
        'password' => Hash::make('admin')
    ));
}

}