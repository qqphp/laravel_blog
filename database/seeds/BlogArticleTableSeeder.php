<?php

use Illuminate\Database\Seeder;

class BlogArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nav_id = [3,4,14];
        for ($i = 0 ;$i < 100;$i++) {
            DB::table('blog_nav_article')->insert([
                'article_title' => Str::random(10),
                'article_content' => Str::random(200),
                'article_describe' => Str::random(200),
                'article_click' => rand(1, 99999),
                'article_like' => rand(1, 99999),
                'article_collect' => rand(1, 99999),
                'article_share' => rand(1, 99999),
                'article_show' => 1,
                'article_sort' => rand(1, 99999),
                'nav_id' => $nav_id[array_rand($nav_id)],
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time())
            ]);
        }
    }
}
