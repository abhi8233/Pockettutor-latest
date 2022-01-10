<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subscription;

class UserPlan extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
