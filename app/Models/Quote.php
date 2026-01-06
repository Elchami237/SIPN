<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'company', 'service_type', 'start_date', 'end_date', 'description', 'budget_range', 'attachments', 'status', 'ip_address', 'ip_stored_at', 'is_read', 'read_at'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'attachments' => 'array',
        'is_read' => 'boolean',
        'read_at' => 'datetime',
        'ip_stored_at' => 'datetime',
    ];
}
