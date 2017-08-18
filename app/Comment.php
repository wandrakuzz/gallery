<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable =  [
      'comment',
      'image_id',
      'user_id'
    ];


    public function scopeallComment($query, $id)
    {
      return $query->whereImageId($id)->latest();
    }

    public function user()
    {
      return $this->belongsTo(User::Class);
    }


}
