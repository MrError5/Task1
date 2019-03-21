<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = 
    [
    	'id',
    	'news_title',
    	'main_photo',
    	'news_content',
    	'category_id',
    ];

    	public function category_id() {
		return $this->hasOne('App\Model\Category', 'id', 'category_id');
	}

       public function files()
    {
        return $this->hasMany('App\File','relation_id','id')->where('file_type','news');
    }
}
