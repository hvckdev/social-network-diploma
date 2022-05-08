<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Models\User;
use App\Services\UlSTUApiService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class GroupController extends Controller
{
    private UlSTUApiService $ulStuApiService;

    public function __construct(UlSTUApiService $ulSTUApiService)
    {
        $this->ulStuApiService = $ulSTUApiService;
        $this->authorizeResource(Group::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $groups = Group::paginate(15);

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $users = User::all();
        $groups = $this->ulStuApiService->getGroups();

        return view('groups.create', compact('users', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateGroupRequest $request
     * @return RedirectResponse
     */
    public function store(CreateGroupRequest $request): RedirectResponse
    {
        $group = Group::create($request->validated());

        return redirect()->route('groups.edit', $group->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Group $group
     * @return View
     */
    public function show(Group $group): View
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @return Application|Factory|View
     */
    public function edit(Group $group): View|Factory|Application
    {
        $users = User::all();
        $groups = $this->ulStuApiService->getGroups();

        return view('groups.edit', compact('users', 'group', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGroupRequest $request
     * @param Group $group
     * @return RedirectResponse
     */
    public function update(UpdateGroupRequest $request, Group $group): RedirectResponse
    {
        $group->update($request->validated());

        return redirect()->route('groups.edit', $group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     * @return RedirectResponse
     */
    public function destroy(Group $group): RedirectResponse
    {
        $group->delete();

        return redirect()->route('groups.index');
    }
}
