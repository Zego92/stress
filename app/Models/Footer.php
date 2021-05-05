<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'footers';

    protected $fillable = [
        'language_id',
        'contactTitle',
        'email',
        'phone',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
