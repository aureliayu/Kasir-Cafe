<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeModel extends Model
{
    use HasFactory;
    protected $table = 'coffee';
    protected $primarykey = 'id';
    public $timestamps = false;
    public $fillable = [
       'name','size','price','image','createdAt','updatedAt'
    ];

}
