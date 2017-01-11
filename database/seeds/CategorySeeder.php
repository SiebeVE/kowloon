<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table( 'categories' )->insert( [
			[
				'css' => "dog",
			],
			[
				'css' => "cat",
			],
			[
				'css' => "fish",
			],
			[
				'css' => "bird",
			],
			[
				'css' => "hamster",
			],
			[
				'css' => "other",
			]
		] );

		DB::table( 'category_translations' )->insert( [
			[
				"category_id" => 1,
				"locale"      => "en",
				"name"        => "Dogs",
				'slug'        => "dog",
			],
			[
				"category_id" => 1,
				"locale"      => "nl",
				"name"        => "Hond",
				'slug'        => "hond",
			],
			[
				"category_id" => 2,
				"locale"      => "en",
				"name"        => "Cats",
				'slug'        => "cat",
			],
			[
				"category_id" => 2,
				"locale"      => "nl",
				"name"        => "Kat",
				'slug'        => "kat",
			],
			[
				"category_id" => 3,
				"locale"      => "en",
				"name"        => "Fish",
				'slug'        => "fish",
			],
			[
				"category_id" => 3,
				"locale"      => "nl",
				"name"        => "Vissen",
				'slug'        => "vissen",
			],
			[
				"category_id" => 4,
				"locale"      => "en",
				"name"        => "Birds",
				'slug'        => "bird",
			],
			[
				"category_id" => 4,
				"locale"      => "nl",
				"name"        => "Vogels",
				'slug'        => "vogel",
			],
			[
				"category_id" => 5,
				"locale"      => "en",
				"name"        => "Small animals",
				'slug'        => "small-animals",
			],
			[
				"category_id" => 5,
				"locale"      => "nl",
				"name"        => "Kleine beesten",
				'slug'        => "kleine-beesten",
			],
			[
				"category_id" => 6,
				"locale"      => "en",
				"name"        => "Other",
				'slug'        => "other",
			],
			[
				"category_id" => 6,
				"locale"      => "nl",
				"name"        => "Andere",
				'slug'        => "andere",
			],
		] );
	}
}
