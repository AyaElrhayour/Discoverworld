<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function adventure(){
        return $this->belongsTo(Adventure::class, 'adventure_id');
    }
}
