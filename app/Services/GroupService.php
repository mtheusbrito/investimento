<?php

namespace App\Services;

use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;


class GroupService
{

    private $repository;
    private $validator;


    public function __construct(GroupRepository $repository, GroupValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $group = $this->repository->create($data);
            return [
                'success' => true,
                'messages' => "Grupo cadastrado",
                'data' => $group,

            ];
        } catch (Exception $e) {
            // dd($e);
            switch (get_class($e)) {
                case QueryException::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class:
                    return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                default:
                    return ['success' => false, 'messages' => get_class($e)];
            }
        }
    }

    public function userStore($group_id, $data)
    {
        try {
            $group    = $this->repository->find($group_id);
            $user_id  = $data['user_id'];

            $group->users()->attach($user_id);


            // dd($group->users);
            return [
                'success' => true,
                'messages' => "Usuario incluido no grupo!",
                'data' => '',

            ];
        } catch (Exception $e) {
            switch (get_class($e)) {
                case QueryException::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class:
                    return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                default:
                    return ['success' => false, 'messages' => get_class($e)];
            }
        }
    }

    public function destroy($group_id)
    {
        try {
            $this->repository->delete($group_id);
            return [
                'success' => true,
                'messages' => 'Grupo removido.',
                'data' => null

            ];
        } catch (Exception $e) {
            switch (get_class($e)) {
                case QueryException::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class:
                    return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class:
                    return ['success' => false, 'messages' => $e->getMessage()];
                default:
                    return ['success' => false, 'messages' => get_class($e)];
            }
        }
    }
}
