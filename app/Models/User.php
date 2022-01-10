<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Subscription;
use App\Models\Country;
use App\Models\State;
use App\Models\Languages;
use App\Models\FieldInterest;
use App\Models\Bookings;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'institution_id',
        'field_of_interest',
        'specialization_id',
        'language_id',
        'country_id',
        'state_id',
        'subscriptions_id',
        'tutor_fee',
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
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function languages()
    {
        return $this->belongsTo(Languages::class);
    }
    public function fieldInterest()
    {
        return $this->belongsTo(FieldInterest::class);
    }
public function booking()
    {
        return $this->belongsTo(Bookings::class);
    }
}
