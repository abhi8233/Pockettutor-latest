<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TutorSlot extends Model
{
    use HasFactory;
    protected $table='tutor_slots';
    protected $guarded=['id'];

    protected $fillable = [
    	'tutor_id',
        'slot_date',
        'slot_start_time',
        'slot_end_time',
        'slot_note' 
    ];


    public function tutor_user()
    {
        return $this->belongsTo(User::class,'tutor_id','id')->where('role','Tutor');
    }
}
