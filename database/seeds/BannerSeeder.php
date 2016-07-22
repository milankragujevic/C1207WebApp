<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner1=\App\Banner::create([
            'id'=>1,
            'link'=>'default.png'
        ]);
        $banner1->movie()->associate(\App\Movie::find(1));
        $banner2=\App\Banner::create([
            'id'=>2,
            'link'=>'default.png'
        ]);
        $banner2->movie()->associate(\App\Movie::find(2));
        $banner3=\App\Banner::create([
            'id'=>3,
            'link'=>'default.png'
        ]);
        $banner3->movie()->associate(\App\Movie::find(3));
        $banner4=\App\Banner::create([
            'id'=>4,
            'link'=>'default.png'
        ]);
        $banner4->movie()->associate(\App\Movie::find(4));;
        $banner5=\App\Banner::create([
            'id'=>5,
            'link'=>'default.png'
        ]);
        $banner5->movie()->associate(\App\Movie::find(5));;
        $banner6=\App\Banner::create([
            'id'=>6,
            'link'=>'default.png'
        ]);
        $banner6->movie()->associate(\App\Movie::find(6));
    }
}
