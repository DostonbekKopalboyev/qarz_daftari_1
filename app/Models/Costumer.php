<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;
    protected $fillable = [
      'name', 'phone', 'address', 'description', 'debt', 'trust_status','user_id'
    ];
    public function debts()
    {
        return $this->hasMany(Debt::class,'costumer_id','id');
    }
    public function Payment()
    {
        return $this->hasMany(Payment::class);
    }
    public function DebtAll()
    {
        return $this->belongsTo(Debt::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
