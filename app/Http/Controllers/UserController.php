<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    private $users = [
        ['id' => 1, 'name' => 'Mohammadhasan' , 'email' => 'mhmmdhsn135@gmail.com' ],
        ['id' =>2, 'name' => 'Elias' , 'email' => 'elias@gmail.com'],
        ['id' => 3 , 'name' => 'Mojtaba' , 'email' => 'mojtaba@gmail.com'],
    ];

    public function index()
    {
        return response()->json([$this->users]);
    }

    public function show($id)
    {
        $user = collect($this->users)->firstWhere('id', $id);
        return $user
            ? response()-> json($user)
            : response()-> json(['message' => 'User not found'],404);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $newUser = [
            'id' => count($this->users) + 1,
            'name' => $request->name,
            'email' => $request->email,
        ];
        return response()-> json($newUser,201);
    }

    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        $user = collect($this->users)->firstWhere('id', $id);
        if($user){
            return response()-> json(['message' => 'User not found'],404);
        }
        $user['name'] = $request ->name ?? $user['name'];
        $user['email'] = $request -> email ?? $user['email'];

        return response()-> json($user);
    }

    public function destroy(string $id)
    {
        return response()-> json(['message' => "User With ID {$id} deleted"]);
    }
}
