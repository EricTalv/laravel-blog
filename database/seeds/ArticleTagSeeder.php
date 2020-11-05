<?php

use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_tag')->insert(
            [
                'article_id' => factory(App\Article::class)->create()->id,
                'tag_id' => factory(App\Tag::class)->create()->id,
            ]
        );
    }
}
