<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'unique_number',
        'city',
        'service_price',
        'equipment_price',
        'payment_method',
        'plan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
