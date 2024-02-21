<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'excerpt',
        'body',
    ];
    public function catagory()
    {
        return $this->belongsTo(catagory::class);
    }
}
