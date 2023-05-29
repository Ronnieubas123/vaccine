<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registerform extends Model
{
    use HasFactory;
    public $table = 'registerform';
    protected $fillable = ['receive_vaccine_dose', 'first_vaccine_type', 'interested_vaccine','citizen_id','vaccine_location','vaccine_date','status','pregnant','month','days','reference_id','dose','user_id'];
}

