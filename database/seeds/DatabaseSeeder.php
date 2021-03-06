<?php
use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
require 'UserTableSeeder.php';

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('UserTableSeeder');
	}

}
