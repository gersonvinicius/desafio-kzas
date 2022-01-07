<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'teste@teste.com';
        $user->password = bcrypt('123456');

        User::create([
            'name' => 'CTO',
            'email' => 'cto@admin.com',
            'isAdmin' => 1,
            'permission' => 1,
            'password' => bcrypt('123456')
        ]);
    }
}
