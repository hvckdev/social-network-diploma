<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupAnnouncementRequest;
use App\Http\Requests\UpdateGroupAnnouncementRequest;
use App\Models\Announcement;
use App\Models\Group;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class AnnouncementController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Group $group
     * @return Application|Factory|View
     */
    public function create(Group $group): Application|Factory|View
    {
        return view('groups.announcements.create', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateGroupAnnouncementRequest $request
     * @param Group $group
     * @return RedirectResponse
     */
    public function store(CreateGroupAnnouncementRequest $request, Group $group): RedirectResponse
    {
        $group->announcements()->create($request->validated());

        return redirect()->route('groups.show', $group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @param Announcement $announcement
     * @return Application|Factory|View
     */
    public function edit(Group $group, Announcement $announcement)
    {
        return view('groups.announcements.edit', compact('group', 'announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGroupAnnouncementRequest $request
     * @param Group $group
     * @param Announcement $announcement
     * @return RedirectResponse
     */
    public function update(UpdateGroupAnnouncementRequest $request, Group $group, Announcement $announcement): RedirectResponse
    {
        $announcement->update($request->validated());

        return redirect()->route('groups.show', $group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     * @param Announcement $announcement
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Group $group, Announcement $announcement): RedirectResponse
    {
        $announcement->deleteOrFail();

        return redirect()->route('groups.show', $group);
    }
}
