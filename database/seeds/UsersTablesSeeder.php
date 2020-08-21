<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'  =>  'ksmks0921',
            'email' =>   'ksmks0921@gamil.com',
            'email_verified_at'  =>  "2019-04-11",
            'password'  =>   Hash::make('password'),
            'remember_token'  =>  str_random(10),
            'created_at'  =>  "2019-04-11",
            'updated_at'  =>  "2019-04-11",
        ]);
    }
}
