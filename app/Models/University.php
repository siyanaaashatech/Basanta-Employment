<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class University extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['logo', 'title', 'slug', 'country_id', 'phone_no', 'email', 'website'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
