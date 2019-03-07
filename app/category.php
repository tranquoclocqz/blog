<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "table_category";
	public $primaryKey = "id";

	protected $attributes = [
		'type'=> '',
		'hienthi'=> 1,
		'photo'=>'',
		'thumbnail'=>'',
		'parent_id'=>0,
	];
	protected $fillable = ['type', 'hienthi', 'photo', 'thumbnail', 'title', 'keywords', 'description','parent_id'];

	public function parent() {
        return $this->belongsTo(category::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(category::class, 'parent_id');
    }
}
