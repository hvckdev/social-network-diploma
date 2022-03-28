<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\Pure;
use Multicaret\Acquaintances\Traits\CanBeLiked;

class Article extends Model
{
    use HasFactory;
    use CanBeLiked;

    protected $fillable = ['name', 'text'];

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    #[Pure] public function getDescriptionAttribute(): string
    {
        return strip_tags(Str::limit($this->text));
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('id')->desc();
    }
}
