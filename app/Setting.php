<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table    = 'settings';
    protected $fillable = 
    [

    	'id',
    	'site_name',
    	'site_email',
    	'site_keywords',
    	'site_description',
    	'maintenance',
    	'maintenance_message',

    ];
}
