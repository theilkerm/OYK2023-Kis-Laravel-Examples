<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    //yaş hesaplama için birth date'nin format olduğu belirtilir. Carbon kütüphanesi ile kullanılır.
    protected $casts = [
        'birth_date' => 'date',
    ];

    //yaş hesaplama
    public function getAgeAttribute()
    {
        // birth_date boş geliyor ise hata dönmemesi için null coalescing operator kullanıldı (birth_date'den sonra ? işareti)
        return $this->birth_date?->age;
    }


    //kurslar ve katılımcılar arasında ilişki kuruldu (öğrenci bir kursa aittir)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}