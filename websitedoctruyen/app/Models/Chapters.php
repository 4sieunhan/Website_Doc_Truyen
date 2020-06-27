<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $table = 'chapters';

    protected $fillable = ['name','content'];

    public $timestamps = false;

    public function story(){
        return $this->belongsTo('App\Models\Stories');
    }
}
