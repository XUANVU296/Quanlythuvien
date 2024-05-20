<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table ='students';
    protected $fillable = [
        'code',
        'name',
        'group',
    ];
    public function borrowns()
    {
        return $this->hasMany(Borrown::class);
    }
    public function borrowndetail()
    {
        return $this->hasMany(BorrownDetail::class);
    }
}
