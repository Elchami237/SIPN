<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Actualite extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'slug',
        'resume',
        'contenu',
        'image_affiche',
        'statut',
        'date_publication',
        'category_id',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'date_publication' => 'datetime',
        'meta_description' => 'array',
        'meta_keywords' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($actualite) {
            if (empty($actualite->slug)) {
                $actualite->slug = Str::slug($actualite->titre);
            }
        });

        static::updating(function ($actualite) {
            if ($actualite->isDirty('titre') && empty($actualite->slug)) {
                $actualite->slug = Str::slug($actualite->titre);
            }
        });
    }

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ActualiteImage::class)->ordered();
    }

    // Scopes
    public function scopePublie($query)
    {
        return $query->where('statut', 'publie')
                    ->where('date_publication', '<=', now());
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('date_publication', 'desc');
    }

    // Accessors
    public function getImageAfficheUrlAttribute()
    {
        if ($this->image_affiche) {
            return asset('storage/' . $this->image_affiche);
        }
        return null;
    }

    public function getDatePublicationFormateeAttribute()
    {
        if ($this->date_publication) {
            return $this->date_publication->format('d/m/Y');
        }
        return null;
    }

    public function getResumeCourtAttribute()
    {
        return Str::limit($this->resume, 150);
    }

    public function getUrlAttribute()
    {
        return route('actualites.show', $this->slug);
    }

    public function getEstPublieAttribute()
    {
        return $this->statut === 'publie' && 
               $this->date_publication && 
               $this->date_publication <= now();
    }
}