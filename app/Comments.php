<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {
  // comments table in blog DB

  // restrict columns from modification
  // NONE We want to modify all
  protected $guarded = [];

  // returns instance of the user who authored comment
  public function author()
  {
    return $this->belongsTo('App\User', 'from_user');
  }

  // returns post that comment belongs to
  public function post()
  {
    return $this->belongsTo('App\Posts', 'on_post');
  }
}
