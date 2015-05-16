<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role, App\Models\User, App\Models\Contact, App\Models\Post, App\Models\Tag, App\Models\PostTag, App\Models\Comment;
use App\Services\LoremIpsumGenerator;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$lipsum = new LoremIpsumGenerator;


    
		Role::create([
			'title' => 'Администратор',
			'slug' => 'admin'
		]);

		Role::create([
			'title' => 'Преподователь',
			'slug' => 'redac'
		]);

		Role::create([
			'title' => 'Ученик',
			'slug' => 'user'
		]);


		User::create([
			'username' => 'Vadim Polh',
			'email' => 'vadimpolh@gmail.com',
			'password' => Hash::make('2302366230Pv.'),
			'seen' => true,
			'role_id' => 1
		]);


	}

}
