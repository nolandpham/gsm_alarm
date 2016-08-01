<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// class Project extends Authenticatable
class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', /*'email', 'password',*/
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token_id', /*'password', 'remember_token',*/
    ];

    protected $table = 'projects';

    public function token()
    {
        return $this->hasMany('App\Token');
    }
}
