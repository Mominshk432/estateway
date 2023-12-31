<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'heading'
            ]
        ];
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProjectImages::class, 'project_id', 'id');
    }

    public function custom_specs()
    {
        return $this->hasMany(CustomSpecs::class, 'project_id', 'id');
    }

    public function getStatus()
    {
        return $this->hasOne(ProjectStatuses::class, 'id', 'status');
    }
}
