<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $table = 'booking_slots';
    protected $guarded=['id'];

    public function tutor(){
        return $this->belongsTo('App\Models\User','tutor_id','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    
    public function specialization(){
        return $this->belongsTo('App\Models\Specialization','specialization_id','id');
    }
     public function language(){
        return $this->belongsTo('App\Models\Languages','language_id','id');
    }
}
