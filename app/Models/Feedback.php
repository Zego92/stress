<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'user_id',
        'fio',
        'email',
        'status',
        'phone',
        'title',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusAttribute(): string
    {
        switch ($this->status){
            case 1:
                return 'Получен';
                break;
            case 2:
                return 'Обрабатывается';
                break;
            case 3:
                return 'Обратотан';
                break;
        }
    }
}
