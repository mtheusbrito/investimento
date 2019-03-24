<?php
namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Services\UserService;
use App\Http\Requests\UserCreateRequest;


class UsersController extends Controller
{
    protected $service;
    protected $repository;


    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return view('user.index');
    }
    public function store(UserCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        if ($request['success'])
            $usuario = $request['data'];

        else
            $usuario = null;

        return view('user.index', [
            'usuario' => $usuario,
        ]);
    }

    public function show($id)
    { }

    public function edit($id)
    { }
}
