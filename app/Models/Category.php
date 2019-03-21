<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name',
        'slug',
        'parent_id',
        'status',
        'keywords',
        'description',
    ];

    public function post()
    {
        return $this->hasMany('App\Models\Post','id');
    }

    public function child()
    {
        return $this->hasMany('App\Models\Category','parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category');
    }


}
