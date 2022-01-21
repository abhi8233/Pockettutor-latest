<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subscription;

class UserPlan extends Model
{
    use HasFactory;
    protected $table='user_plans';
    protected $guarded=['id'];
    
    protected $fillable = [
        'user_id',
        'subscription_id',
        'price',
        'minutes',
        'remaining_minutes',
        // 'slots'
    ];
    
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
