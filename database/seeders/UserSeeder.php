<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Elfego Melgar',
            'email' => 'melgarelfego@gmail.com',
            'password' => bcrypt('12345')
        ]);

        //User::factory(99)->create();
        User::factory(9)->create();
    }
}
