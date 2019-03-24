<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Auth;
use Exception;

class DashboardController extends Controller
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    public function auth(Request $request)
    {
        $data = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];
        try {
            if (env('PASSWORD_HASH')) {
                Auth::attempt($data, false);
            } else {
                $user = $this->repository->findWhere(['email' => $request->get('email')])->first();

                if (!$user)
                    throw new Exception("Email invalido");

                if ($user->password != $request->get('password'))
                    throw new Exception('Senha invalida');
                Auth::login($user);
            }


            return redirect()->route('user.dashboard');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function index()
    {
        return view('user.dashboard');
    }
}
