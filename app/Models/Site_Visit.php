<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site_Visit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'property_id');
    }
}
