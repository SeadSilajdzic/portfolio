<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'client',
        'project_url',
        'title',
        'description',
        'slug',
        'featured'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
