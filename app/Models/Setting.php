<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Setting extends Model
{
    use HasFactory;
    protected $table='setting';
    protected $guarded=['id'];

    protected $fillable = [
    	'setting_key',
    	'setting_value'
    ];

}
