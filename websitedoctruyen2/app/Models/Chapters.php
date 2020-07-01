<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $table = "chapters";

    protected $fillable = ['name','subname','content'];

    public $timestamps = true;

    public function story(){
        return $this->belongsTo('App\Models\Stories');
    }
}
