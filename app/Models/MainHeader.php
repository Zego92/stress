<?php

namespace App\Models;

use App\Traits\UploadImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use function PHPUnit\Framework\at;

class MainHeader extends Model
{

    use HasFactory, UploadImage;

    protected $table = 'main_headers';

    protected $attributes = [
        'brandLogoImage'
    ];

    protected $fillable = [
        'language_id',
        'brandLogoImage',
        'brandLogoImageLink',
        'homeTitle',
        'homeLink',
        'ourProjectsTitle',
        'ourProjectsLink',
        'contactTitle',
        'contactLink',
        'feedbackTitle',
        'feedbackLink',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function setBrandLogoImageAttribute($value): string
    {
        return $this->uploadImage('brandLogoImage', $value);
    }
}
