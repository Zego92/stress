<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostGallery extends Model
{
    use HasFactory;

    protected $table = 'post_galleries';

    protected $fillable = [
        'post_id',
        'image',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
