<?php

use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $admin=new \App\User();
        $admin->name='Administrator';
        $admin->email='admin@gmail.com';
        $admin->password=bcrypt('1234567');
        $admin->role='admin';
        $admin->save();
        $staff=new \App\User();
        $staff->name='Staff';
        $staff->email='staff@gmail.com';
        $staff->password=bcrypt('1234567');
        $staff->save();
    }
}
