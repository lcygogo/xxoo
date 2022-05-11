<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public $table = 'product_type';
   public $primaryKey = 'id';
    public $guarded = [];
    public $timestamps = false;
}
