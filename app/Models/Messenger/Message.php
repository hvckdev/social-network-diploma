<?php

namespace App\Models\Messenger;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    /**
     * @var string
     */
    protected $table = 'messenger_messages';

    protected $fillable = [
        'content'
    ];

    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class);
    }

    public function createForSend($thread_id): Model
    {
        return $this->chats()->create([
            'thread_id' => $thread_id,
            'type' => 0,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function createForReceive($thread_id, $to_user): Model
    {
        return $this->chats()->create([
            'thread_id' => $thread_id,
            'type' => 1,
            'user_id' => $to_user]);
    }
}
