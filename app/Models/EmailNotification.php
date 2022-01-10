<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EmailNotification extends Model
{
    use HasFactory;
    protected $table='email_notification';
    protected $guarded=['id'];

    protected $fillable = [
    	'admin_email',
    	'name',
    	'email',
    ];
}
