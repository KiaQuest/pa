<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followable extends Model
{
    use HasFactory;
    protected $table = 'Followables';
    protected $primaryKey = 'follower_id';
    protected $guarded = [];
    public $timestamps = false;
    public function users() : MorphToMany
    {
        return $this->morphedByMany(User::class , 'Followable');
    }
}
