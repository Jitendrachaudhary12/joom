<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

 protected $table = 'users_task';
     protected $fillable =   [
        'user_id',
        'start_time',
        'stop_time',
        'notes',
        'description',
    ];
    // public function children(){
    //     return $this->hasMany( 'App\Models\AdminMenu', 'user_id', 'id' );
    // }
    // public function sons(){
    //     return $this->hasMany( 'App\Models\AdminMenu', 'super_parent_id', 'id' );
    // }
}
