<?php

namespace App\Models;

use App\User;
use App\Models\Reply;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','slug','body','user_id','category_id'];

    protected $with = ['replies'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($question){
            $question->slug = Str::slug($question->title);
        });

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    public function replies()
    {
        return $this->hasMany(Reply::class)->latest();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    } 

    public function getPathAttribute()
    {
        return "/question/$this->slug";
    }


}
