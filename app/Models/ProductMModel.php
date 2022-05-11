<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMModel extends Model
{
    use HasFactory;
    public $table = 'product_management';
    public $primaryKey = 'id';
    public $guarded = [];
    public $timestamps = false;
}
