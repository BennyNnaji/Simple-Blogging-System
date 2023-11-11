<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'data',
        'images'
    ];
    public function images()
{
    return $this->hasMany(Image::class);
}
}
