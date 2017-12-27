<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'role';
    
    
    public function users(){
        return $this->belongsToMany(User::class, 'role_user');
    }
    
}
