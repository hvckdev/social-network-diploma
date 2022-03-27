<?php

namespace App\Services;

use App\Models\Group;
use Illuminate\Support\Facades\Http;

class UlSTUApiService
{
    private string $ulStuApi = 'https://time.ulstu.ru/api/1.0';

    public array $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    public function getGroups()
    {
        return Http::get("{$this->ulStuApi}/groups")->object()->response;
    }

    public function getScheduleForGroup(Group $group)
    {
        return Http::get("$this->ulStuApi/timetable?filter={$group->name}")->object()->response;
    }
}
