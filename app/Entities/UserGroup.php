<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGroup extends Model
{

    use Notifiable;
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'user_groups';
    protected $fillable = ['user_id', 'group_id', 'permission'];
    protected $hidden = [];
}
