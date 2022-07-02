<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'date_published'];

    protected $dates = [
        'date_published'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
