<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_path',
        'caption'
    ];

    public function admin(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
