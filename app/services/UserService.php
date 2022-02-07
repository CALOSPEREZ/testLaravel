<?php

namespace App\Services;

use App\Models\User;
use App\Utils\Enums\EnumResponse;
use Exception;
use Illuminate\Database\Eloquent\Builder;

class UserService
{

    function __construct()
    {
    }
    function index($id)
    {
        try {
        } catch (Exception $e) {
            return $e;
        }
    }

    public function getUsersByRole($role_id = null)
    {
        $users = User::when($role_id, function (Builder $query) use ($role_id) {
            $query->whereHas('roles', function (Builder $query) use ($role_id) {
                $query->where('id', $role_id);
            });
        })->get();
        return $users;
    }

    public function createUser($request)
    {
        if ($request['role']) {
            if ($request['role'] === "Super Admin") {
                return bodyResponseRequest('THIS ACTION IS UNAUTHORIZED', EnumResponse::UNAUTHORIZED);
            }
        }
        $request['password'] = bcrypt($request['password']);
        $user = User::create([
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => $request['password']
        ])->assignRole($request['role']);
        return $user;
    }

    public function destroyUser($user)
    {
        $user->delete();
        return true;
    }


    public function update($data, $id)
    {
        $user = $this->showUser($id);
        if (!$user) return null;
 
        if ($data['role'])
            $user->syncRoles($data['role']);
        if ($data['password'])
            $user->password = bcrypt($data['password']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
        $model = $this->showUser($id);
        return  $model;
    }
    public function showUser($data)
    {
        return  User::find($data);
    }
}
