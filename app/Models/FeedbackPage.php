<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedbackPage extends Model
{
    use HasFactory;

    protected $table = 'feedback_pages';

    protected $fillable = [
        'language_id',
        'headerTitle',
        'fioTitle',
        'fioPlaceholderTitle',
        'emailTitle',
        'emailPlaceholderTitle',
        'phoneTitle',
        'phonePlaceholderTitle',
        'messageTitle',
        'messagePlaceholderTitle',
        'messageDescriptionTitle',
        'messageDescriptionPlaceholderTitle',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
