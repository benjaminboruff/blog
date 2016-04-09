<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // user has many comments
    public function posts()
    {
      return $this->hasMany('App\Posts', 'author_id');
    };

    // user has many comments
    public function comments()
    {
      return $this->hasMany('App\Comments', 'from_user');
    };

    // can user post?
    public function can_post()
    {
      $role = $this->role;
      if($role == 'author' || $role == 'admin')
      {
        return true;
      }
      return false;
    };

    // is the user an admin?
    public function is_admin()
    {
      $role = $this->role;
      if($role == 'admin')
      {
        return true;
      }
      return false;
    };
}
