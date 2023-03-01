<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;
    protected $fillable = [
      'name', 'phone', 'address', 'description', 'debt', 'trust_status'
    ];
    public function Dept()
    {
        return $this->hasMany(Debt::class);
    }
    public function Payment()
    {
        return $this->hasMany(Payment::class);
    }
}
