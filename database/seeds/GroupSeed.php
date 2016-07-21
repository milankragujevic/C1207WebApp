<?php

use Illuminate\Database\Seeder;

class GroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Group::create([
            'group_name'=>'Hot'
        ]);
        \App\Group::create([
            'group_name'=>'Upcoming'
        ]);
        \App\Group::create([
            'group_name'=>'Requested'
        ]);
        \App\Group::create([
            'group_name'=>'Banner'
        ]);
    }
}
