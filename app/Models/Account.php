<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'gps_id',
        'sim_number'
    ];

    public function statuses() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function tariffs() {
        return $this->belongsTo(Tariff::class, 'tariff_id');
    }
}
