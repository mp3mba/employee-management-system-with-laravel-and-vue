<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middletname',
        'lastname',
        'email',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'department_id',
        'birth_date',
        'hire_date'
    ];

    protected $casts = [
        'birth_date' => 'datetime:y-m-d',
        'hire_date' => 'datetime:y-m-d',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
    
    public function state(){
        return $this->belongsTo(State::class);
    }
    
    public function city(){
        return $this->belongsTo(City::class);
    }
    
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
