<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //make fields fillable for mass assignment
    protected $fillable = ['title', 'description', 'tags', 'duration', 'image','user_id'];

    //scope for filtering tags and search
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('duration', 'like', '%' . request('search') . '%');
        }
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
