<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employer extends Authenticatable
{
    use HasFactory;

    protected $table = 'employers';

    protected $fillable = ['first_name', 'last_name', 'company_name', 'email', 'contact', 'image', 'pan_number', 'status', 'pan_image', 'website', 'location', 'city_id', 'description', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
