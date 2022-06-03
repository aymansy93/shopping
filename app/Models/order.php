<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';

    use HasFactory;

    protected $fillable = ['order_numper','user_id','total','created_at','updated_at','status'];



    public function order_details()
    {
        return $this->hasMany(order_details::class, 'order_id', 'id');
    }




    public function products()
    {
        return $this->hasMany(product::class, 'order_id', 'id');
    }

    /**
     * Get all of the comments for the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id')-get();
    }
    











}
