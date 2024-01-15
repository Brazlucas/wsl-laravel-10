<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected User $repository)
    { }

    public function index()
    {
        $users = $this->repository->all();
        
        return UserResource::collection($users);
    }

    public function show(string $id)
    {
        // Examples of how to find a user by id
        // $user = $this->repository->find($id);
        // $user = $this->repository->where('id', '=', $id)->first();
        // if (!$user) {
        //     return response()->json(['message' => 'user not found'], 404);
        // }
        $user = $this->repository->findOrFail($id);

        return new UserResource($user);

    }

    public function store(StoreUpdateUserRequest $request)
    {
       $data = $request->validated();
       $data['password'] = bcrypt($data['password']);

       $user = $this->repository->create($data);

       return new UserResource($user);
    }

    public function update(StoreUpdateUserRequest $request, string $id) {
        $user = $this->repository->findOrFail($id);

        $data = $request->all();

        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);

        return new UserResource($user);
    }

    public function destroy(string $id)
    {
        $user = $this->repository->findOrFail($id);

        $user->delete();

        return response()->json(['message' => 'Usuário excluído com sucesso.'], 200);
    }
}
