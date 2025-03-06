<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function guests()
    {
        return $this->hasMany(GuestUser::class, 'instance_id','id');
    }
    public function attendants()
    {
        return $this->hasMany(ScanHistory::class, 'instance_code','code');
    }

}
