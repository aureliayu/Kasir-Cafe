<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordermodel extends Model
{
    use HasFactory;
    protected $table='order_detail';
    protected $primarykey='id';
    public $timestamps=false;
    public $fillable=['order_id','coffee_id','quantity','price','createdAt','updatedAt'];
}
