<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    protected $fillable = [
        'code'
    ];

    public function mainHeader(): HasOne
    {
        return $this->hasOne(MainHeader::class);
    }

    public function banner(): HasOne
    {
        return $this->hasOne(Banner::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function footer(): HasOne
    {
        return $this->hasOne(Footer::class);
    }

    public function feedbackPage(): HasOne
    {
        return $this->hasOne(FeedbackPage::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class);
    }
}
