<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "products";
    public $fillable = [
        "product_name",
        "product_desc",
        "price",
        "qty",
        "category_id",
        "brands_id",
    ];
}
