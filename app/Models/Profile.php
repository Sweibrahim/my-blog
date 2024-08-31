<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    /**
     * Summary of user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected $guarded = [];
    public function imageProfile(){
        $imagePath = ($this->image) ? $this->image : 'profile/eiVy66gFcxr6MyEZk9J6IvY7uBJI4P78iC6JItET.png';
        return '/storage/' . $imagePath;
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function follower()
    {
        return $this->belongsToMany(User::class);
    }
}
