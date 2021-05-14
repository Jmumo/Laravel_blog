<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Post extends Model
{   


    use HasFactory;

    use SoftDeletes;

    public function category(){
      return $this->belongsTo(Category::class);
    }

    protected $fillable = [

      'content','title','featured','category_id','slug','user_id'
    ];

    protected $dates = ['deleted_at'];

    public function getFeaturedAttribute($featured){

        return asset('/storage/images/'.$featured);
    }

    public function tags(){

      return $this->belongsToMany(Tag::class);
    }

    public function user(){

      return $this->belongsTo(User::class);
    }
}
