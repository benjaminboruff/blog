<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

// instance of Posts class will refer to posts table

class Posts extends Model {
  // posts table in blog DB

  // restrict columns from modification
  // NONE We want to modify all
  protected $guarded = [];

  // posts have many comments
  // returns all comments on the post
  public function comments()
  {
    return $this->hasMany('App\Comments', 'on_post');
  }

  // returns the instance of the user who is author
  // of the post
  public function author()
  {
    return $this->belongsTo('App\User', 'author_id');
  }
}
