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
        $admin->password=bcrypt('98752qsc!@#');
        $admin->role='admin';
        $admin->save();
		 $admin=new \App\User();
        $admin->name='Administrator1';
        $admin->email='admin1@gmail.com';
        $admin->password=bcrypt('4589asd@#$');
        $admin->role='admin';
        $admin->save();
		 $admin=new \App\User();
        $admin->name='Administrator2';
        $admin->email='admin2@gmail.com';
        $admin->password=bcrypt('6689wdf$%^');
        $admin->role='admin';
        $admin->save();
        $staff=new \App\User();
        $staff->name='Staff';
        $staff->email='staff@gmail.com';
        $staff->password=bcrypt('5678rty&*^');
        $staff->save();
		$staff=new \App\User();
        $staff->name='Staff1';
        $staff->email='staff1@gmail.com';
        $staff->password=bcrypt('7856fgh$%^');
        $staff->save();
		$staff=new \App\User();
        $staff->name='Staff2';
        $staff->email='staff2@gmail.com';
        $staff->password=bcrypt('5689iop$%^');
        $staff->save();
    }
}
