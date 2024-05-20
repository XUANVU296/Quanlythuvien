<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrownDetail extends Model
{
    use HasFactory;
    protected $table = 'BorrownDetail';
    protected $fillable = [
        'borrown_id',
        'book_id',
        'note',
    ];
    public function borrown()
    {
        return $this->belongsTo(Borrown::class);
    }

    // Định nghĩa mối quan hệ belongsTo với model Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
