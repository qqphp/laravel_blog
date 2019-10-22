<?php

use Illuminate\Database\Seeder;

class BlogSubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0;$i < 1000;$i++){
            DB::table('blog_subscribes')->insert([
                'is_pass' =>2,
                'email' => Str::random(10).'@gmail.com',
                'add_mode' =>2,
            ]);
        }
    }
}
