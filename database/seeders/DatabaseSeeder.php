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

        User::factory()
            ->count(10)
            ->has(Article::factory()->count(rand(1,10)), 'articles')
            ->create();


    }
}
