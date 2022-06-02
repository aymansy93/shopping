<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_product extends Model
{
    use HasFactory;

    protected $fillable=['type_product'];




    public function type_products()
    {
        return $this->hasMany(product::class, 'type_products', 'id');
    }




}
