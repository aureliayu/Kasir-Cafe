<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listmodel extends Model
{
    use HasFactory;
    protected $table='order_list';
    protected $primarykey='id';
    public $timestamps=false;
    public $fillable=[
        'customer_name','order_type','order_date','createdAt','updatedAt' ];
    
}
