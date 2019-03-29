<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // $this->call(UsersTableSeeder::class);
        User::create([
        'cpf'=>'11122233344' ,
        'name'=>'Matheus Brito',
        'phone'=>'22999979775',
        'birth'=>'1996-05-05',
        'gender'=>'M',
        'email'=>'mtheusbrito@gmail.com',
        'password'=> env('PASSWORD_HASH') ? bcrypt('123456'):'123456',

        ]);
    }
}
