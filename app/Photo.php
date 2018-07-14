<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $dir = '/uploads/';

  protected $fillable = ['file'];

  public function getFileAttribute($photo) {
    return $this->dir . $photo;
  }
}
