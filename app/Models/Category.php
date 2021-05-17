<?php

namespace App\Models;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @method static create(array $array)
 */
class Category extends Model
{
    use HasFactory, UploadImage;

    protected $table = 'categories';

    protected $fillable = [
        'language_id',
        'name',
        'slug',
        'image',
    ];

    public function setSlugAttribute(): string
    {
        return $this->attributes['slug'] = Str::slug($this->name);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function setImageAttribute($value): string
    {
        return $this->uploadImage('image', $value);
    }
}
