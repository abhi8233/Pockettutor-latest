<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Subscription extends Model
{
    use HasFactory;
    protected $table='subscriptions';
    protected $guarded=['id'];

    protected $fillable = [
    	'plan',
    	'price',
    	'minutes',
    	'slots',
    	
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
