<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    
    protected $table = 'email_template';
    protected $guarded=['id'];

    protected $fillable = [
        'subject',
        'message',
        'role',
        'status',
        'tag_name'
    ];

    
}
