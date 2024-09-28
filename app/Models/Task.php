<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'start_at',
        'expired_at',
        'user_id',   
        'company_id' 
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}