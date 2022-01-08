<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EmailNotification extends Model
{
     protected $table='email_notification';
    use HasFactory;
    protected $guarded=['id'];
}
