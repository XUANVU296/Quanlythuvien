<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrown extends Model
{
    use HasFactory;
    protected $table = 'borrowns';
    protected $fillable = [
        'BorrownDate',
        'student_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function books()
    {
        return $this->belongsToMany(Book::class, 'BorrownDetails', 'borrown_id', 'book_id')->withPivot('note');
    }
    public function borrowndetail()
    {
        return $this->hasMany(BorrownDetail::class);
    }
}
