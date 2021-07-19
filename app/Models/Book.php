<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'ddcCode', 'name', 'author', 'genre', 'publisher', 
        'translator', 'country', 'review', 'copies', 'price',
        'image'
    ];
}
