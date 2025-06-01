<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswamodel extends Model
{
    
    use HasFactory;
    protected $table='siswa';
    protected $primarykey='id';
    public $timestamps=false;
    public $fillable=['nama','kelas','alamat'];
}
