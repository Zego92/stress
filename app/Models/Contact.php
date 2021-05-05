<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'language_id',
        'firstPhone',
        'secondPhone',
        'thirdPhone',
        'address',
        'startTimeWork',
        'endTimeWork',
        'email',
        'gMapLink',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
