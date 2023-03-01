<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;
    protected $fillable = [
        'costumer_id', 'user_id', 'product', 'quantity', 'end_day', 'status'
    ];

    public function User()
    {
        $this->belongsTo(User::class);
    }

    public function Costumer()
    {
        $this->belongsTo(Costumer::class);
    }
}
