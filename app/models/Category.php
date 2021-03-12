<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class Category extends Model
{
    protected $table = 'categorys';
    protected $fillable = ['category', 'category_id'];
    public $timestamps = true;

    public function tasks() {
        return $this -> hasMany (Task::class ,'category_id','categorys');
  }
}
