<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function instance()
    {
        return $this->belongsTo(Instance::class, 'instance_id', 'id');
    }
}
