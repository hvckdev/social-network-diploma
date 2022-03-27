<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Services\UlSTUApiService;

class ScheduleController extends Controller
{
    public function index(Group $group, UlSTUApiService $ulSTUApiService)
    {
        $schedule = $ulSTUApiService->getScheduleForGroup($group);

        return view('groups.schedule.index', compact('schedule', 'ulSTUApiService'));
    }
}
