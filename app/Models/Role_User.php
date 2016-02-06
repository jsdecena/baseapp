<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    public $table = 'role_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id', 'user_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
