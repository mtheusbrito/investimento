<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\UserRepository;

use App\Repositories\InstituitionRepository;

use App\Services\GroupService;
use App\Services\InstituitionService;
use Illuminate\Support\Facades\Response;


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

    public function show($group_id)
    {
        $group = $this->repository->find($group_id);

        $users = $this->userRepository->selectBoxList();
        return view(
            'groups.show',
            [
                'group' => $group,
                'users' => $users,
            ]
        );
    }
    public function paginateMembers($group_id)
    {
        $group = $this->repository->find($group_id);
        $users = $group->users;
        return Response::json($users);
    }
    public function edit($group_id)
    {
        $group = $this->repository->find($group_id);
        $user_list = $this->userRepository->selectBoxList();
        $instituition_list = $this->instituitionRepository->selectBoxList();

        return view('groups.edit', [
            'group' => $group,
            'user_list' => $user_list,
            'instituition_list' => $instituition_list,

        ]);
    }
    public function update(GroupUpdateRequest $request, $id)
    {
        $request = $this->service->update($request->all(), $id);

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('groups.index');
    }


    public function userStore(Request $request, $group_id)
    {

        $request = $this->service->userStore($group_id, $request->all());
        $userStore = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);


        return redirect()->route('groups.show', $group_id);
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

    public function paginate()
    {
        $groups = $this->repository->with('owner')->with('instituition')->with('users')->all();
        return Response::json($groups);
    }
}
