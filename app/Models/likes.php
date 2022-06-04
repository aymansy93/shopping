<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    protected $fillable = ['user_id','product_id','like'];

    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id','id');
    }
    

}
