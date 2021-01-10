<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Tag;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

//        factory(App\Article::class, 10)->create();
//        factory(App\Tag::class, 3)->create();

        Article::factory()->count(10)->create();
        Tag::factory()->count(5)->create();

    }
}
