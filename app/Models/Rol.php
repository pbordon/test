<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "Roles";
    protected $guarded = [];
    protected $primaryKey = 'Rol_Id';
    public $timestamps = false;
    use HasFactory;
}
