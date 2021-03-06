<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';

    use HasFactory;

    protected $fillable=['name','title','price','image_path','type_products','order_id','quantity'];
    public $timestamps = TRUE;



    /**
     * Get the user that owns the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function order()
    {
        return $this->belongsTo(order::class, 'order_id	', 'id')-get();
    }

    public function type_product()
    {
        return $this->belongsTo(type_product::class, 'type_products', 'id');
    }

    public function order_details()
    {
        return $this->hasMany(product::class, 'product_name', 'name');
    }
    public function likes()
    {
        return $this->hasMany(likes::class, 'product_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(comments::class, 'product_id', 'id');
    }


}
