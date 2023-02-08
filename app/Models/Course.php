<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // bir kursun birden fazla öğrencisi olabilir. bağlantı kuruldu.
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
