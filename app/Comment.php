<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'user_id', 'is_active', 'email', 'content', 'photo_id'];

    public function post() {
      return $this->belongsTo('App\Post');
    }

    public function user() {
      return $this->belongsTo('app\User');
    }

    public function replies() {
      return $this->hasMany('App\CommentReply');
    }
}
