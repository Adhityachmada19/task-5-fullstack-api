<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable=['category_id','title','content','author'];

    public function category(){
        return $this->belongsTo('App\Models\Categories');
    }
    use HasFactory;
}
