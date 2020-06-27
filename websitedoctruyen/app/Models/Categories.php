<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';


    protected $fillable = ['name','parent_id','keyword','description'];

    public $timestamps = false;

    public function story(){
        return $this->belongsToMany('App\Models\Stories','story_categories');
    }
}
