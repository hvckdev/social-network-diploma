<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

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

    public function information(): HasMany
    {
        return $this->hasMany(UserInformation::class);
    }

    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class, 'friends', 'user_id', 'friend_id')
            ->wherePivot('accepted', '=', 1);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function communities(): HasMany
    {
        return $this->hasMany(Community::class);
    }

    public function fullNameAttribute(): string
    {
        return $this->information[0]->first_name.' '.$this->information[0]->middle_name.' '.$this->information[0]->last_name;
    }

    function friendsOfMine(): BelongsToMany
    {
        return $this->belongsToMany('User', 'friends', 'user_id', 'friend_id')
            ->wherePivot('accepted', '=', 1) // to filter only accepted
            ->withPivot('accepted'); // or to fetch accepted value
    }

    function friendOf(): BelongsToMany
    {
        return $this->belongsToMany('User', 'friends', 'friend_id', 'user_id')
            ->wherePivot('accepted', '=', 1)
            ->withPivot('accepted');
    }

    public function getFriendsAttribute()
    {
        if (!array_key_exists('friends', $this->relations)) $this->loadFriends();

        return $this->getRelation('friends');
    }

    protected function loadFriends()
    {
        if (!array_key_exists('friends', $this->relations)) {
            $friends = $this->mergeFriends();

            $this->setRelation('friends', $friends);
        }
    }

    protected function mergeFriends()
    {
        return $this->friendsOfMine->merge($this->friendOf);
    }
}
