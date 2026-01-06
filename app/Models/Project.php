<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'client',
        'location',
        'start_date',
        'end_date',
        'category',
        'featured_image',
        'is_featured'
    ];

    public $translatable = ['title', 'description'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
    ];

    // Relations
    public function images()
    {
        return $this->hasMany(Media::class, 'related_id')
            ->where('related_type', 'project')
            ->orderBy('order');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title['fr'] ?? $project->title['en'] ?? '');
            }
        });
    }
}
