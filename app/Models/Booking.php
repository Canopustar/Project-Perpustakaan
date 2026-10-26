<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';

    protected $guarded = [
        'id',
    ];

    public function booking_detail()
    {

        return $this->hasMany(BookingDetail::class, 'id_booking', 'id_booking');
    }

    public function anggota()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
