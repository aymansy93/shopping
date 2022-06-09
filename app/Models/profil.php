<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    protected $table = 'profils';
    protected $fillable = ['user_id','username','title','profil_photo'];

    use HasFactory;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }



}
