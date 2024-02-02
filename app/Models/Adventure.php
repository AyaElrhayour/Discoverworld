<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'email', 'destinations', 'description', 'location', 'website'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['destinations'] ?? false) {
            $query->where('destinations', 'like', '%' . request('destinations') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orwhere('description', 'like', '%' . request('search') . '%')
                ->orwhere('destinations', 'like', '%' . request('search') . '%');
        }
    }


    
    //Relashionship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images(){
        return $this->hasMany(Image::class, 'adventure_id');
    }
}
