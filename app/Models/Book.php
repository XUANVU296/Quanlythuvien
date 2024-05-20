<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'code',
        'name',
        'author',
    ];
    public function borrowns()
    {
        return $this->belongsToMany(Borrown::class, 'BorrownDetails', 'book_id', 'borrown_id')->withPivot('note');
    }
}
