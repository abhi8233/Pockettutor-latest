<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'document';
    protected $guarded=['id'];

    protected $fillable = [
        'document_key',
        'document_value',
        'document_type',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    
    
}
