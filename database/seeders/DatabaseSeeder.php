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
            ->has(Article::factory()->count(3));


    }
}
