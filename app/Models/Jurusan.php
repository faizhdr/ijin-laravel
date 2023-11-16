<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    
    protected $table ='jurusan';

    protected $guarded = [];

    public function post(){
        return $this->hasMany(Post::class, 'jurusan_id', 'id');
    }
}
