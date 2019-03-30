<?php
namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Services\UserService;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

use Illuminate\Support\Facades\Response;


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
        $users = $this->repository->all();

        return view('user.index', ['users' => $users]);
        $users;
    }
    public function create()
    {

        return view('user.create');
    }
    public function store(UserCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        // $usuario = $request['success'] ? $request['data'] : null;

        // dd($request);
        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);


        // return view('user.index', [
        //     'usuario' => $usuario,
        // ]);
        return redirect()->route('users.index');
    }
    public function update(UserUpdateRequest $request, $id)
    {
        
        $request = $this->service->update($request->all(), $id);
        
        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);


        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $request = $this->service->destroy($id);

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('users.index');
    }


    public function paginate()
    {
        $users = $this->repository->all();
        return Response::json($users);
    }

    public function edit($id_user)
    {
        $user = $this->repository->find($id_user);
        return view('user.edit', [
            'user' => $user
        ]);
    }
   
}
