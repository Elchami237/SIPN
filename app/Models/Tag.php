<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'slug'];

    public $translatable = ['name'];



    protected static function boot() {
        parent::boot();
        static::creating(function ($tag) {
            if (empty($tag->slug)) {
                $tag->slug = Str::slug($tag->name['fr'] ?? $tag->name['en'] ?? '');
            }
        });
    }
}
