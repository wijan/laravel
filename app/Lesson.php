<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'lesson';
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    
    /*
    
    app/models
    
    
    
    
    */
    
}
