<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => 1,
            'comment_description' => 'Wow! Very Good!',
            'created_at' => Carbon::now(),

        ]);

        DB::table('comments')->insert([
            'user_id' => 1,
            'comment_description' => 'I Have Nothing To Say!',
            'created_at' => Carbon::now(),

        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'comment_description' => 'I Like It!',
            'created_at' => Carbon::now(),

        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'comment_description' => '!I dont like it',
            'created_at' => Carbon::now(),

        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'comment_description' => 'Nice One!',
            'created_at' => Carbon::now(),

        ]);
    }
}
