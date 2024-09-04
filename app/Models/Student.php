<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_no',
        'rent',
        'name',
        'cnic',
        'guadian_name',
        'guadian_cnic',
        'email',
        'phone',
        'date',
        'address',
        'picture',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
