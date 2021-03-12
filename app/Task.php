<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\models\Category;
class Task extends Model
{
    protected $table = 'tasks';
    protected $guarded = [];
    public $timestamps = true;

    public function Task (){
        return $this->belongsTo(Category::class,'category_id');
    }
}
