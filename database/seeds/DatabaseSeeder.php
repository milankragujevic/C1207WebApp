<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminAccountSeeder::class);
        //$this->call(GroupSeed::class);
        //$this->call(BannerSeeder::class);
    }
}
