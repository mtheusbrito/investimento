<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable;
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'users';
    protected $fillable = ['cpf','name','phone','birth','gender','notes','email','password','status','permission'];
    protected $hidden = ['password', 'remember_token'];
}
