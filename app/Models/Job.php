<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo(Employer::class, 'company_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo(JobType::class, 'type_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(JobCategories::class, 'category_id', 'id');
    }
}
