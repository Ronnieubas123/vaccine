<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registerform extends Model
{
    use HasFactory;
    public $table = 'registerform';
    protected $fillable = ['receive_vaccine_dose', 'first_vaccine_type', 'interested_vaccine', 'firstname','middlename','lastname','dof','age','address_line_1','city','state','zipcode','phone','email','sex','vaccine_location','vaccine_date'];
}

