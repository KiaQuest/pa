<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follow extends Model
{
    use HasFactory;

    protected $table = 'follows';
    protected $primaryKey = 'user_id';
    protected $guarded = [];
    public $timestamps = false;
    public function follows()
    {
        return $this->morphedByMany(User::class , 'followable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'follow_user','follow_id' , 'user_id');
    }
}


