<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'language_id',
        'image',
        'title',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
