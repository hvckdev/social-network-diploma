<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id', 'first_name', 'middle_name', 'last_name', 'birthday', 'city', 'country', 'website', 'show_middle_name',
        'show_birthday', 'show_city', 'show_country', 'show_email', 'show_website', 'visited_at'
    ];

    protected $dates = ['visited_at'];

    protected $casts = [
        'show_middle_name' => 'boolean',
        'show_birthday' => 'boolean',
        'show_city' => 'boolean',
        'show_country' => 'boolean',
        'show_email' => 'boolean',
        'show_website' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function getInGroupAttribute(): bool
    {
        return $this->group_id !== null || ($this->group->curator_id ?? null) === $this->user->id;
    }
}
