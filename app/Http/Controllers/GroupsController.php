<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\UserRepository;

use App\Repositories\InstituitionRepository;

use App\Services\GroupService;
use App\Services\InstituitionService;

class GroupsController extends Controller
{

    protected $repository;
    protected $service;
    protected $instituitionRepository;
    protected $userRepository;


    public function __construct(GroupRepository $repository, GroupService $service, InstituitionRepository $instituitionRepository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->service  = $service;
        $this->instituitionRepository = $instituitionRepository;
        $this->userRepository = $userRepository;
    }

    public function store(GroupCreateRequest $request)
    {

        $request = $this->service->store($request->all());
        $group = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('groups.index');
    }
    public function index()
    {
        $groups = $this->repository->all();



        return view('groups.index', [
            'groups' => $groups,
        ]);
    }

    public function create()
    {

        $instituitions = $this->instituitionRepository->selectBoxList();
        $users = $this->userRepository->selectBoxList();
        return view(
            'groups.create',
            [
                'user_list' => $users,
                'instituition_list' => $instituitions
            ]
        );
    }

    public function destroy($group_id)
    {
        $request = $this->service->destroy($group_id);
        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);
        return redirect()->route('groups.index');
    }
}
