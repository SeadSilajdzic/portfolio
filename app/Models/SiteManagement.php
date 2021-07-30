<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteManagement extends Model
{
    use HasFactory;

    protected $dates = [
        'birthday'
    ];

    protected $fillable = [
        'main_title',
        'facebook',
        'behance',
        'twitter',
        'instagram',
        'skype',
        'm_teams',
        'linkedin',

        'aboutDesc',
        'role_title',
        'short_note',
        'birthday',
        'website',
        'phone',
        'city',
        'age',
        'education',
        'mail',
        'status',
        'aboutme',
        'featured',
        'cv',

        'service_intro',
        'service1title',
        'service1desc',
        'service2title',
        'service2desc',
        'service3title',
        'service3desc',
        'service4title',
        'service4desc',
        'service5title',
        'service5desc',
        'service6title',
        'service6desc',
    ];
}
