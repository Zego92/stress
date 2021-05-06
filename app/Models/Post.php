<?php

namespace App\Models;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, UploadImage;

    protected $table = 'posts';

    protected $fillable = [
        'language_id',
        'category_id',
        'title',
        'slug',
        'description',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(PostGallery::class);
    }

    public function setSlugAttribute(): string
    {
        return $this->attributes['slug'] = Str::slug($this->title);
    }

    public function setImageAttribute($value): string
    {
        return $this->uploadImage('image', $value);
    }
}
