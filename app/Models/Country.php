<?php

namespace App\Models;

use App\Models\University;
use App\Models\VisitorBook;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['name', 'slug', 'image', 'content'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function universities()
    {
        return $this->hasMany(University::class, 'country_id');
    }

    public function visitorBooks()
    {
        return $this->hasMany(VisitorBook::class, 'country_id');
    }
}
