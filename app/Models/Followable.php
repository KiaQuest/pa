<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followable extends Model
{
    use HasFactory;
    protected $table = 'Followable';
    protected $primaryKey = 'user_id';
    protected $guarded = [];
    public $timestamps = false;
    public function users() : MorphToMany
    {
        return $this->morphedByMany(User::class , 'Followable');
    }
}
