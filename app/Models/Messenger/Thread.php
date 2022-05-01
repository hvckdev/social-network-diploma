<?php

namespace App\Models\Messenger;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Carbon;

class Thread extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'messenger_threads';

    /**
     * @var string[]
     */
    protected $fillable = ['first_user_id', 'second_user_id'];

    public function chats(): HasManyThrough
    {
        return $this->hasManyThrough(Chat::class, Message::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function deleteChats(): void
    {
        $this->chats()->where('user_id', auth()->id())->delete();
    }

    public function deleteMessages(): void
    {
        $this->messages()->delete();
    }

    public function block(): void
    {
        $this->is_block = true;
        $this->blocked_by = auth()->id();
        $this->save();
    }

    public function unblock()
    {
        $this->is_block = false;
        $this->blocked_by = null;
        $this->save();
    }

    public static function createOrFindThreadWithRecipient($recipient)
    {
        $thread = self::query()
            ->where(function ($query) use ($recipient) {
                $query
                    ->where('first_user_id', '=', auth()->id())
                    ->where('second_user_id', '=', $recipient);
            })->orWhere(function ($query) use ($recipient) {
                $query
                    ->where('first_user_id', '=', $recipient)
                    ->where('second_user_id', '=', auth()->id());
            });

        if ($thread->count() <= 0) {
            $thread = self::firstOrCreate([
                'first_user_id' => auth()->id(),
                'second_user_id' => $recipient,
            ]);
        } else {
            $thread = $thread->get()->first();
        }

        return $thread;
    }

    public function getLatestMessage(): Model|bool|HasMany|null
    {
        return $this->messages()->latest()->first();
    }

    public function getRecipient($userId)
    {
        return $this->first_user_id === $userId ? User::find($this->second_user_id) : User::find($this->first_user_id);
    }

    public function getUnreadMessagesCountAttribute()
    {
        return $this->chats->where('read_at', null)->where('type', 0)->where('user_id', '!=', auth()->id())->count();
    }

    public function read(): void
    {
        $chats = $this->chats->where('read_at', null)->where('type', 0)->where('user_id', '!=', auth()->id());

        foreach ($chats as $chat) {
            $chat->update(['read_at' => Carbon::now()]);
        }
    }
}
