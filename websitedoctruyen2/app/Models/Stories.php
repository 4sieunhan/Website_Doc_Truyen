<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stories extends Model
{
    protected $table = 'stories';

    protected $fillable = ['name','content','status','source','image','keyword','description'];

    public $timestamps = false;

    public function category(){
        return $this->belongsToMany('App\Models\Categories','story_categories');
    }

    public function author(){
        return $this->belongsToMany('App\Models\Authors','story_authors');
    }
}
