<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $guarded=['id'];

    protected $fillable = [
    	'user_id',
    	'tutor_id',
        'booking_id',
        'description',
        'rating'
    ];
    

    public function tutor(){
        return $this->belongsTo('App\Models\User','tutor_id','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    
}
