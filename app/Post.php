<?php

namespace App;

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
        'post_author',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
