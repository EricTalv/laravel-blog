<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Tag;
use App\User;


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

        User::factory()
            ->times(20)
            ->hasPosts(1)
            ->create();


    }
}
