<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'slug', 'description'];

    public $translatable = ['name', 'description'];

    // Relations
    public function actualites()
    {
        return $this->hasMany(Actualite::class);
    }

    protected static function boot() {
        parent::boot();
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name['fr'] ?? $category->name['en'] ?? '');
            }
        });
    }
}
