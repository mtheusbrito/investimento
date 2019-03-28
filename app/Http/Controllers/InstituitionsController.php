<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InstituitionCreateRequest;
use App\Http\Requests\InstituitionUpdateRequest;
use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use App\Services\InstituitionService;

/**
 * Class InstituitionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class InstituitionsController extends Controller
{
    /**
     * @var InstituitionRepository
     */
    protected $repository;
    protected $service;

    public function __construct(InstituitionRepository $repository, InstituitionService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituitions = $this->repository->all();;
        return view('instituitions.index', [
            'instituitions' => $instituitions,
        ]);
    }
    public function store(InstituitionCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        // dd($request);
        session()->flash(
            'success',
            [
                'success' => $request['success'],
                'messages' => $request['messages'],


            ]
        );
        return redirect()->route('instituitions.index');
    }

    public function show($id)
    {
        $instituition = $this->repository->find($id);

        return view('instituitions.show', [
            'instituition' => $instituition,
        ]);
    }


    public function edit($id)
    {
        $instituition = $this->repository->find($id);

        return view('instituitions.edit', compact('instituition'));
    }


    public function update(InstituitionUpdateRequest $request, $id)
    { }
    public function destroy($id)
    {

        $request = $this->service->destroy($id);
        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);
        return redirect()->route('instituitions.index');
    }

    public function create()
    {
        return view('instituitions.create');
    }
}
