<?php

namespace App\Traits;

use App\Models\Messenger\Thread;
use Illuminate\Database\Eloquent\Builder;

trait Messagable
{
    public function threads(): Builder
    {
        return Thread::query()
            ->where('first_user_id', '=', $this->id)
            ->orWhere('second_user_id', '=', $this->id);
    }

    public function getUnreadMessagesCount(): int
    {
        $count = 0;
        $threads_unread_chats = $this->threads()->withCount([
            'chats as unread_chats_count' => function ($query) {
                $query->where('read_at', null)->where('type', 0)->where('user_id', '!=', auth()->id());
            }
        ])->get();

        foreach ($threads_unread_chats as $thread) {
            $count += $thread->unread_chats_count;
        }

        return $count;
    }
}
