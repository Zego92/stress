<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MainHeader extends Model
{
    use HasFactory;

    protected $table = 'main_headers';

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
}
