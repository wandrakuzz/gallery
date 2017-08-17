<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
  protected $fillable =  [
    'title',
    'image'
  ];

  public function comments()
  {
    return $this->hasMany(Comment::class, 'image_id');

  }
}
