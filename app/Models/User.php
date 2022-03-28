<?php

namespace App\Models;

use App\Models\Blog\Blog;
use App\Models\Messenger\Message;
use App\Traits\Messagable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Multicaret\Acquaintances\Traits\CanLike;
use Multicaret\Acquaintances\Traits\Friendable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use hasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Friendable;
    use Messagable;
    use CanLike;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function information(): HasOne
    {
        return $this->hasOne(UserInformation::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function blog(): HasOne
    {
        return $this->hasOne(Blog::class);
    }

    public function getIsFullRegisteredAttribute(): bool
    {
        return empty($this->information->first_name) !== true;
    }

    public function getHasBlogAttribute(): bool
    {
        return $this->blog()->exists();
    }

    public static function inGroup($group_id): Collection|array
    {
        return UserInformation::query()->where('group_id', '=', $group_id)
            ->with('User')->get();
    }

    public static function notInGroup($group_id): Collection|array
    {
        return UserInformation::query()->where('group_id', '!=', $group_id)->orWhereNull('group_id')
            ->with('User')->get();
    }

    public function getFullNameAttribute(): string
    {
        $middle_name = $this->information->show_middle_name ? $this->information->middle_name : '';

        return "{$this->information->first_name} {$middle_name} {$this->information->last_name}";
    }
}
