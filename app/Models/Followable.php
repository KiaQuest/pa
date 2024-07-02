<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Followable extends Model
{
    use HasFactory;
    protected $table = 'Followables';
    protected $primaryKey = 'follower_id';
    protected $guarded = [];
    public $timestamps = false;
    public function users() : MorphToMany
    {
        return $this->morphedByMany(User::class , 'followable');
    }
}
