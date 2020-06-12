<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Calvin Calvento',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),

        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Test Account',
            'password' => Hash::make('123'),
            'created_at' => Carbon::now(),

        ]);



    }
}
