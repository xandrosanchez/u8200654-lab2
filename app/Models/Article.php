<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // protected $table = 'articles';

    /**
     * @package App\Models
     * @property 
     */


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeBySymbolCode($query, string $code)
    {
        return $query->where('symbol_code', $code);
    }

    public function scopeByPostName($query, string $name)
    {
        return $query->where('name', $name);
    }
}