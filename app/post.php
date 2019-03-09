<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'table_posts';

    protected $attributes = [
		'type'=> '',
		'photo'=>'',
		'thumbnail'=>'',
		'author_id'=>0,
		'posts_status'=>'1',
		'alt'=>'',
	];

	public function author(){
		return $this->belongsTo('App\Admin','author_id','id');
	}
}
