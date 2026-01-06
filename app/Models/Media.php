<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'path',
        'url',
        'type',
        'mime_type',
        'size',
        'alt_text',
        'related_type',
        'related_id',
        'order',
        'uploaded_by'
    ];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
