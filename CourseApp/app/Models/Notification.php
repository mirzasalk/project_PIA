<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_email',
        'user_name',
        
    ];
   
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
