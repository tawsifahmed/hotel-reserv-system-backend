<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Seat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'room_id', 'seat_id', 'start_date', 'end_date', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getFloorAttribute()
    {
        return $this->room ? $this->room->floor : NULL;
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
