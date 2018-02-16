<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = array('title','content','author_id','slug');

    public $timestamps = true;

    public function author(){
        return $this->belongsTo('App\User','author_id');
    }

}
