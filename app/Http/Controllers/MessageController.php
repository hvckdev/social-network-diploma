<?php

namespace App\Http\Controllers;

use App\Models\Messenger\Message;
use App\Models\Messenger\Thread;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('messages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Thread $thread
     * @return Application|Factory|View
     */
    public function show(Thread $thread): View|Factory|Application
    {
        return view('messages.show', compact('thread'));
    }
}
