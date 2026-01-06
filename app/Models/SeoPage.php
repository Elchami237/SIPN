<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SeoPage extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['page_name', 'meta_title', 'meta_description', 'meta_keywords', 'og_image'];

    public $translatable = ['meta_title', 'meta_description'];
}
