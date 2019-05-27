<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::create();

		for($i = 0; $i < 10; $i++) {
			App\Post::create([
				'title' => $faker->realText(100),
				'content' => $faker->realText(300),
				'created_at' => now(),
				'updated_at' => now(),
			]);
		}
    }
}
