<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryCategories extends Model
{
    protected $table = 'story_categories';

    protected $fillable = ['stories_id','categories_id'];

    public $timestamps = false;
}
