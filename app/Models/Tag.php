<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // protected $table = 'products';
    // protected $fillable = ['name', 'price', 'description'];

    // protected $table = 'tags';

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function scopeByName($query, string $name)
    {
        return $query->where('name', $name);
    }
}