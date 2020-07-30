<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //

    use SoftDeletes;

    protected $dates=['deleted_at'];

    protected $fillable=[
        'title',
        'content'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function lan(){
        return $this->belongstoMany('App\Lan');
    }

    public function photo(){
        return $this->morphMany('App\Photo','taggable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag','taggable');
    }
}
