<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $fillable = ['id','name', 'dosage', 'description', 'manufacturer', 'type', 'image'];
}
