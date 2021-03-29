<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class User extends Model
{
    protected $table = 'Users';
    protected $fillable = ['user', 'user_id' , 'status'];
    public $timestamps = true;

    public function tasks() {
        return $this -> hasMany (Task::class ,'user_id','Users');
  }
}
