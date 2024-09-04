<?php

namespace App\Models;

use App\Models\Student;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'room_no',
        'room_seater',
        'room_status',
        'rent',
    ];
    
    public function students()
    {
        return $this->hasMany(Student::class, 'room_id');
    }

}
