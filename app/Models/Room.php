<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'floor_id', 'price_per_night','seats'];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id')->select('id', 'name');
    }
}
