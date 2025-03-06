<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScanHistory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function instances()
    {
        return $this->belongsTo(Instance::class, 'instance_code', 'code');
    }
    public function guests()
    {
        return $this->belongsTo(GuestUser::class, 'guest_code', 'code');
    }
}
