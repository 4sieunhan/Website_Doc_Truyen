<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $table = 'authors';
    
    protected $fillable = ['name','keyword','description'];

    public $timestamps = true;

    public function story(){
        return $this->belongsToMany('App\Models\Stories','story_authors');
    }
}
