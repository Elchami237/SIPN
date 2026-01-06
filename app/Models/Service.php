<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'category',
        'features',
        'is_active',
        'order',
    ];

    public $translatable = ['name', 'description', 'features'];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
