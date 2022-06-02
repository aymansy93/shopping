<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = ['order_numper','user_id','total','created_at','updated_at','order_name','status','qty'];





    public function products()
    {
        return $this->hasMany(product::class, 'order_id', 'id')->get();
    }

    /**
     * Get all of the comments for the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }












}
