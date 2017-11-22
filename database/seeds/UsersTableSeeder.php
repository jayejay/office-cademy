<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Julian',
            'lastname' => 'Eissing',
            'email' => 'julianeissing@web.de',
            'password' => bcrypt($_ENV['EMAIL_PASSWORD']),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Thilo',
            'lastname' => 'Putz',
            'email' => 'lathilo@yahoo.de',
            'password' => bcrypt($_ENV['EMAIL_PASSWORD_THILO']),
            'role_id' => 1
        ]);

//        factory(App\User::class, 11)->create();

    }
}
