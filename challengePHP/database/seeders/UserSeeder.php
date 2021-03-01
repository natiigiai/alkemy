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
        User::create(['name'=>'admin', 'email'=>'admin@admin.com','password'=>'12345678', 'role'=>1]);
        User::create(['name'=>'cliente', 'email'=>'cliente@cliente.com','password'=>'12345678', 'role'=>2]);
    }
}
