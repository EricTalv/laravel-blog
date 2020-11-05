<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Tag;


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
                'article_id' => Article::select('id')->orderByRaw("RAND()")->first()->id,
                'tag_id' => Tag::select('id')->orderByRaw("RAND()")->first()->id,
            ]
        );
    }
}
