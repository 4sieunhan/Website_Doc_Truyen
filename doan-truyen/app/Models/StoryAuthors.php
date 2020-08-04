<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryAuthors extends Model
{
    protected $table = 'story_authors';

    protected $fillable = ['stories_id','authors_id'];

    public $timestamps = false;
}
