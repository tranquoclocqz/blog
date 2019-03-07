<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\admin\category;
use Carbon\Carbon;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 14; $i++) { 
    		$category = new category();
    		$category->ten = 'Danh mục '.$i;
    		$category->title = 'Danh mục '.$i;
    		$category->keywords = 'Danh mục '.$i;
    		$category->description = 'Danh mục '.$i;
    		$category->slug = changeTitle('Danh mục '.$i);
    		$category->type = 'post';
    		$category->photo = 'photo.jpg';
    		$category->thumbnail = 'thumbnail.jpg';
    		$category->save();
    	}
    }
}
