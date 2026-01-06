<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActualiteImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'actualite_id',
        'image_path',
        'alt_text',
        'caption',
        'order',
    ];

    // Relations
    public function actualite()
    {
        return $this->belongsTo(Actualite::class);
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    // Scopes
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}