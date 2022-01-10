<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Languages extends Model
{
    use HasFactory;
    protected $table = 'languages';
    protected $guarded=['id'];

    protected $fillable = [
    	'name',
    ];
 
 	public function users()
    {
        return $this->hasMany(User::class);
    }
}
