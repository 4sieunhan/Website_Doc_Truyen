<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    
    protected $fillable = ['name','keyword','description','parent_id'];

    public $timestamps = true;

    public function story(){
        return $this->belongsToMany('App\Models\Stories','story_categories');
    }
    
}
