<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Subscription;
use App\Models\Languages;
use App\Models\Specialization;
use App\Models\Feedback;
use App\Models\Bookings;
use App\Models\Document;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='users';
    protected $guarded=['id'];

    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'email_verified_at',
        'password',
        'profile',
        'specialization_id',
        'language_id',
        'subscriptions_id',
        'institution',
        'city_institution',
        'country_institution',
        'country_id',
        'state_id',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function subscriptions()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function languages()
    {
        return $this->belongsTo(Languages::class,'language_id','id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class,'tutor_id','id');
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }

    public function booking()
    {
        return $this->hasMany(Bookings::class,'user_id','id');
    }
}
