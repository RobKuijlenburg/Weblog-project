<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'img',
        'premium'
    ];

    public function comments(){

        return $this->hasMany(Comment::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function categories(){

        return $this->belongsToMany(Category::class);
        
    }

}
