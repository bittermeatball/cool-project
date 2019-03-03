<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table='posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title',
        'post_description',
        'post_thumbnail',
        'post_content',
        'category_id',
        'tag_id',
        'post_author',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
